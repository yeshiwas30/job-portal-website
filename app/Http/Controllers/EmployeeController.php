<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch all employees
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function show($id)
    {
        // Fetch a specific employee by ID
        $employee = Employee::findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'profilepic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kebeleid' => 'required|integer',
            'employer_id' => 'required|exists:employers,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Create a new employee with the validated data
        Employee::create($validatedData);

        return redirect('/employees')->with('success', 'Employee added successfully');
    }

    public function edit($id)
    {
        // Fetch a specific employee by ID for editing
        $employee = Employee::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'profilepic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kebeleid' => 'required|integer',
            'employer_id' => 'required|exists:employers,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update the existing employee with the validated data
        Employee::where('id', $id)->update($validatedData);

        return redirect('/employees')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        // Delete a specific employee by ID
        Employee::findOrFail($id)->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully');
    }
}

