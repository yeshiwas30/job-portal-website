<?php

// app/Http/Controllers/EmployeeRatingController.php

namespace App\Http\Controllers;

use App\Models\EmployeeRating;
use Illuminate\Http\Request;

class EmployeeRatingController extends Controller
{
    public function index()
    {
        $ratings = EmployeeRating::all();
        return view('ratings.index', compact('ratings'));
    }

    public function show($id)
    {
        $rating = EmployeeRating::findOrFail($id);
        return view('ratings.show', compact('rating'));
    }

    public function create()
    {
        // You may implement this method if you want a form to create a new rating
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'rating_value' => 'required|integer',
            'employee_id' => 'required|exists:employees,id',
            'employer_id' => 'required|exists:employers,id',
        ]);

        // Create a new rating with the validated data
        EmployeeRating::create($validatedData);

        return redirect()->route('employee-ratings.index')->with('success', 'Rating added successfully');
    }

    public function edit($id)
    {
        $rating = EmployeeRating::findOrFail($id);
        return view('ratings.edit', compact('rating'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'rating_value' => 'required|integer',
            'employee_id' => 'required|exists:employees,id',
            'employer_id' => 'required|exists:employers,id',
        ]);

        // Update the existing rating with the validated data
        EmployeeRating::where('id', $id)->update($validatedData);

        return redirect()->route('employee-ratings.index')->with('success', 'Rating updated successfully');
    }

    public function destroy($id)
    {
        // Delete a specific rating by ID
        EmployeeRating::findOrFail($id)->delete();

        return redirect()->route('employee-ratings.index')->with('success', 'Rating deleted successfully');
    }
}

