<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // Students view form and submit feedback
    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'attachments.*' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Handle file uploads
        $attachments = [];
        if($request->hasFile('attachments')){
            foreach($request->file('attachments') as $file){
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/feedback_attachments', $filename);
                $attachments[] = $filename;
            }
        }

        Feedback::create([
            'student_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'attachments' => $attachments,
        ]);

        return redirect()->back()->with('success','Feedback has been submitted!');
    }

    // Dormitory managers view pending feedback
    public function listPending()
    {
        $feedback = Feedback::where('status','pending')->get();
        return view('feedback.pending', compact('feedback'));
    }

    // Dormitory managers process feedback
    public function process(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $request->validate([
            'response' => 'required|string',
        ]);

        $feedback->update([
            'manager_id' => Auth::id(),
            'response' => $request->response,
            'status' => 'processed',
            'processed_at' => now(),
        ]);

        return redirect()->back()->with('success','Feedback has been processed');
    }

    // Main manager views all feedback
    public function listAll()
    {
        $pending = Feedback::where('status','pending')->get();
        $processed = Feedback::where('status','processed')->get();
        return view('feedback.all', compact('pending','processed'));
    }
}
