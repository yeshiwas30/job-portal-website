<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
 
    public function create()
    {
        return view('job_posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'type' => 'required',
            'salary_wage' => 'required|numeric',
            'responsibility' => 'required',
            'requirement' => 'required',
            'description' => 'required',
        ]);

        JobPost::create($validatedData);

        return redirect()->route('job-posts.index')->with('success', 'Job Post created successfully');
    }

    public function edit($id)
    {
        $jobPost = JobPost::findOrFail($id);
        return view('job_posts.edit', compact('jobPost'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'type' => 'required',
            'salary_wage' => 'required|numeric',
            'responsibility' => 'required',
            'requirement' => 'required',
            'description' => 'required',
        ]);

        JobPost::where('id', $id)->update($validatedData);

        return redirect()->route('job-posts.index')->with('success', 'Job Post updated successfully');
    }

    public function destroy($id)
    {
        JobPost::findOrFail($id)->delete();

        return redirect()->route('job-posts.index')->with('success', 'Job Post deleted successfully');
    }
}
