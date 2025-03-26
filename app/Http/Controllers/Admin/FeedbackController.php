<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.feedback.create');
    }

    public function store(Request $request)
    {
        Feedback::create([
            'name' => $request->name,
            'comment' => $request->comment,
        ]);

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback entry added successfully.');
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->update([
            'name' => $request->name,
            'comment' => $request->comment,
        ]);

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback entry updated successfully.');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback entry deleted successfully.');
    }
}
