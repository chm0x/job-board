<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;

class OfferedJob extends Model
{
    /** @use HasFactory<\Database\Factories\OfferedJobFactory> */
    use HasFactory, SoftDeletes;

    public static array $experience = ['entry', 'intermediate', 'senior'];

    public static array $category = [
        'IT',
        'Finance',
        'Sales', 
        'Marketing'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        /**
         * La sentencia 'use' se utiliza para acceder la 
         * variable AFUERA del SCOPE. 
         */
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function($query) use($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', function($query) use ( $search ){
                        $query->where('company_name', 'like', '%'. $search .'%');
                    });
            });
        })
        ->when($filters['min_salary'] ?? null, function($query, $minSalary){
            $query->where('salary', '>=', (int) $minSalary);
        })
        ->when($filters['max_salary'] ?? null, function($query, $maxSalary){
            $query->where('salary', '<=', (int) $maxSalary );
        })
        ->when($filters['experience'] ?? null, function($query, $experience){
            $query->where('experience', $experience );
        })->when($filters['category'] ?? null, function($query, $category){
            $query->where('category', $category);
        });
    }
}
