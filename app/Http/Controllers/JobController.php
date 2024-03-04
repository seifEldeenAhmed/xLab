<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs=Job::all();
        return view('jobs.index',['jobs'=>$jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Title Validation 
        $request->validate([
            'title' => 'required|max:255', 
        ]);

        //creating record
        Job::create(
            [
                'title' => $request->input('title'), 
                'desc' => $request->input('desc'),
            ]);
        
        return redirect('/jobs')->with('msg','successfully created new user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job=Job::find($id);
        return view('jobs.show',['job'=>$job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job=Job::find($id);
        return view('jobs.edit',['job'=>$job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Title Validation 
        $request->validate([
            'title' => 'required|max:255', 
        ]);
        Job::find($id)->update(
            [
                'title' => $request->input('title'), 
                'desc' => $request->input('desc'),
        ]);
        return redirect('/jobs')->with(['msg'=>'successfully updated the Job']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::find($id)->delete();
        $msg='Delete done successfully';
        return redirect('/jobs')->with(['msg'=>$msg]);
    }
}
