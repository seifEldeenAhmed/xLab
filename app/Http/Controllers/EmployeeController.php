<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #getting all Employees and passing it to index view 
        $employees= Employee::with('job')->get();
        return view('employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobs=Job::all();
        return view('employees.create',['jobs'=>$jobs]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:employees,email',
        ], [
            'fullname.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email has already been taken.',
        ]);

        Employee::create(
            [
                'name' => $request->input('fullname'), 
                'email' => $request->input('email'),
                'job_id'=> $request->input('jobtitle')
            ]);
        
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        #getting the user using ID
        $emp=Employee::find($id);
        return view('employees.show',['employee'=>$emp]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emp=Employee::find($id);
        $jobs=Job::all();
        return view('employees.edit',['emp'=>$emp, 'jobs'=>$jobs]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Email validation 

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email has already been taken.',
        ]);

            //Getting the Employee record and updating it

        Employee::find($id)->update(
            [
                'name' => $request->input('fullname'),
                'email'=>$request->input('email'),
                'job_id'=>$request->input('jobtitle')
        ]);
        return redirect('/employees')->with(['msg'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        $msg='Delete done successfully';
        return redirect('/employees')->with(['msg'=>$msg]);
    }
    public function filterByJob($job){
        //Job title as URI is Hyphen seperated
        $job = str_replace('-', ' ', $job);
        //Getting Job having same title
        $job=Job::where('title',$job)->get();
        //Get Id from collection
        $jobId=$job[0]->id;

        //Get desired employees
        $employees = Employee::where('job_id', $jobId)->get();

        return response()->json(['employees' => $employees]);
    }
}
