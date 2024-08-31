<?php

// app/Http/Controllers/EmployeeProfileController.php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        $profiles = EmployeeProfile::all();
        return view('employee_profiles.index', compact('profiles'));
    }

    public function show($id)
    {
        $profile = EmployeeProfile::findOrFail($id);
        return view('employee_profiles.show', compact('profile'));
    }

    public function create()
    {
        return view('employee_profiles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone_number' => 'required',
            'job_category' => 'required',
            'description' => 'nullable',
            'kebele_id' => 'required|integer',
            'employee_id' => 'required|exists:employees,id',
        ]);

        EmployeeProfile::create($validatedData);

        return redirect()->route('employee-profiles.index')->with('success', 'Profile created successfully');
    }

    public function edit($id)
    {
        $profile = EmployeeProfile::findOrFail($id);
        return view('employee_profiles.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone_number' => 'required',
            'job_category' => 'required',
            'description' => 'nullable',
            'kebele_id' => 'required|integer',
            'employee_id' => 'required|exists:employees,id',
        ]);

        EmployeeProfile::where('id', $id)->update($validatedData);

        return redirect()->route('employee-profiles.index')->with('success', 'Profile updated successfully');
    }

    public function destroy($id)
    {
        EmployeeProfile::findOrFail($id)->delete();

        return redirect()->route('employee-profiles.index')->with('success', 'Profile deleted successfully');
    }
}

