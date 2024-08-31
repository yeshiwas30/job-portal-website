<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use Illuminate\Http\Request;

class JobApplicantController extends Controller
{
    public function index()
    {
        $applicants = JobApplicant::all();
        return view('job_applicants.index', compact('applicants'));
    }

    public function show($id)
    {
        $applicant = JobApplicant::findOrFail($id);
        return view('job_applicants.show', compact('applicant'));
    }

    public function create()
    {
        return view('job_applicants.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'job_post_id' => 'required|exists:job_posts,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        JobApplicant::create($validatedData);

        return redirect()->route('job-applicants.index')->with('success', 'Job applicant created successfully');
    }

    public function edit($id)
    {
        $applicant = JobApplicant::findOrFail($id);
        return view('job_applicants.edit', compact('applicant'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'job_post_id' => 'required|exists:job_posts,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        JobApplicant::where('id', $id)->update($validatedData);

        return redirect()->route('job-applicants.index')->with('success', 'Job applicant updated successfully');
    }

    public function destroy($id)
    {
        JobApplicant::findOrFail($id)->delete();

        return redirect()->route('job-applicants.index')->with('success', 'Job applicant deleted successfully');
    }
}

