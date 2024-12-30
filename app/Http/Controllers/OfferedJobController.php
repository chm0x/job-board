<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OfferedJob;

class OfferedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = OfferedJob::query();
        $jobs->when(request('search'), function ($query) {
            $query->where(function($query){
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%');
            });
        })
        ->when(request('min_salary'), function($query){
            $query->where('salary', '>=', (int)request('min_salary'));
        })
        ->when(request('max_salary'), function($query){
            $query->where('salary', '<=', (int)request('max_salary'));
        });
        // return view('job.index', ['jobs' => OfferedJob::simplePaginate(5)]);
        return view('job.index', ['jobs' => $jobs->simplePaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OfferedJob $job)
    {
        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
