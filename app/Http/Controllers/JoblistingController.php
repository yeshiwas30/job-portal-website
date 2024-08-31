<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;

class JoblistingController extends Controller
{
    public function index(Request $request)
    {       
        $salary = $request->query('sort'); 
        $date = $request->query('date'); 
        $jobType = $request->query('job_type'); 

        $jobposts = JobPost::query();

        if($salary === 'salary_high_to_low') {
            $jobposts->orderByRaw('CAST(salary AS UNSIGNED) DESC');            

        } elseif($salary === 'salary_low_to_high') {
            $jobposts->orderByRaw('CAST(salary AS UNSIGNED) ASC');            
        }

        if($date === 'latest') {
            $jobposts->orderBy('created_at', 'desc');
        } elseif($date === 'oldest') {
            $jobposts->orderBy('created_at', 'asc');
        }

        if($jobType === 'Fulltime') {
            $jobposts->where('job_type', 'Fulltime');
        } elseif($jobType === 'Parttime') {
            $jobposts->where('job_type', 'Parttime');
        } elseif($jobType === 'Casual') {
            $jobposts->where('job_type', 'Casual');
        }elseif($jobType === 'Contract') {
            $jobposts->where('job_type', 'Contract');
        }

        $jobs = $jobposts->with('profile')->get();

        return view('home',compact('jobs'));
    }

    public function show(JobPost $jobpost)
    {
        return view('show', compact('JobPost'));
    }

    public function company($id)
    {
        $company =  User::with('jobs')->where('id', $id)->where('type','employer')->first();

        return view('company', compact('company'));
    }

}
