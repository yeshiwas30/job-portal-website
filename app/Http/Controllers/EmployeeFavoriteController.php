<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/EmployeeFavoriteController.php
use App\Models\EmployeeFavorite;

class EmployeeFavoriteController extends Controller
{
    public function show($id)
    {
        $employeeFavorite = EmployeeFavorite::findOrFail($id);
        return view('employee-favorites.show', compact('employeeFavorite'));
    }

    public function create()
    {
        // You might want to fetch a list of employees and employers to display in the create form
        // $employees = Employee::all();
        // $employers = Employer::all();
        // return view('employee-favorites.create', compact('employees', 'employers'));

        return view('employee-favorites.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'favorite_add_by' => 'required|exists:employers,id',
        ]);

        EmployeeFavorite::create($validatedData);

        return redirect()->route('employee-favorites.index')->with('success', 'Employee favorite added successfully');
    }

    public function edit($id)
    {
        $employeeFavorite = EmployeeFavorite::findOrFail($id);
        // You might want to fetch a list of employees and employers to display in the edit form
        // $employees = Employee::all();
        // $employers = Employer::all();
        // return view('employee-favorites.edit', compact('employeeFavorite', 'employees', 'employers'));

        return view('employee-favorites.edit', compact('employeeFavorite'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'favorite_add_by' => 'required|exists:employers,id',
        ]);

        EmployeeFavorite::where('id', $id)->update($validatedData);

        return redirect()->route('employee-favorites.index')->with('success', 'Employee favorite updated successfully');
    }

    public function destroy($id)
    {
        EmployeeFavorite::findOrFail($id)->delete();
        
        return redirect()->route('employee-favorites.index')->with('success', 'Employee favorite deleted successfully');
    }
}
