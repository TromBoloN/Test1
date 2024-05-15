<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submissions;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'NIS' => 'required|integer|max:12',
            'mapel' => 'required|string|max:25',
            'file' => 'required|file|max:40000', // Assuming the maximum file size is 40MB (40,000 KB)
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Store the submitted file
        $filePath = $request->file('file')->store('submissions', 'local');

        // Create a new submission record
        $submission = new Submissions();
        $submission->user_id = $user->id; // Assuming 'user_id' is the foreign key for the 'id' column in the 'users' table
        $submission->NIS = $validatedData['NIS'];
        $submission->mapel = $validatedData['mapel'];
        $submission->file_path = $filePath;
        $submission->save();

        return redirect()->back()->with('success', 'Tugas berhasil diserahkan');
    }
}
