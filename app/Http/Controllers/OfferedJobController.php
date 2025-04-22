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
        $filters = request()
                    ->only(
                        'search',
                        'min_salary',
                        'max_salary',
                        'experience',
                        'category'
                    );

        return view('job.index', [ 
            'jobs' => OfferedJob::filter($filters)->simplePaginate(5) 
        ]);
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
