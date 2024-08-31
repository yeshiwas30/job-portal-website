<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        // Fetch all employers
        $employers = Employer::all();

        return view('employers.index', compact('employers'));
    }

    public function show($id)
    {
        // Fetch a specific employer by ID
        $employer = Employer::findOrFail($id);

        return view('employers.show', compact('employer'));
    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kebele_id' => 'required|integer',
            'userid' => 'required|exists:users,id',
        ]);

        // Create a new employer with the validated data
        Employer::create($validatedData);

        return redirect('/employers')->with('success', 'Employer added successfully');
    }

    public function edit($id)
    {
        // Fetch a specific employer by ID for editing
        $employer = Employer::findOrFail($id);

        return view('employers.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kebele_id' => 'required|integer',
            'userid' => 'required|exists:users,id',
        ]);

        // Update the existing employer with the validated data
        Employer::where('id', $id)->update($validatedData);

        return redirect('/employers')->with('success', 'Employer updated successfully');
    }

    public function destroy($id)
    {
        // Delete a specific employer by ID
        Employer::findOrFail($id)->delete();

        return redirect('/employers')->with('success', 'Employer deleted successfully');
    }
}
