<?php


namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'commented_date' => 'required|date',
            'commented_by_id' => 'required|exists:employers,id',
            'employee_id' => 'required|exists:employees,id',
            'employer_id' => 'required|exists:employers,id',
        ]);

        Comment::create($validatedData);

        return redirect()->route('comments.index')->with('success', 'Comment created successfully');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'commented_date' => 'required|date',
            'commented_by_id' => 'required|exists:employers,id',
            'employee_id' => 'required|exists:employees,id',
            'employer_id' => 'required|exists:employers,id',
        ]);

        Comment::where('id', $id)->update($validatedData);

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully');
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully');
    }
}

