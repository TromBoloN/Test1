<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submissions;
use App\Models\Grade;

class GradingController extends Controller
{
    public function index()
    {
        // Fetch all submissions for grading
        $submissions = Submissions::all();

        // Pass the submissions to the grading view
        return view('guru', compact('submissions'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'NIS' => 'required', // Ensure NIS is present in the request
            'nilai' => 'required|numeric|min:0|max:100', // Example validation rule for nilai (grade)
        ]);

        // Create a new grading instance
        $grading = new Grade();

        // Assign values to grading attributes from the request
        $grading->NIS = $request->input('NIS'); // Use NIS as the identifier
        $grading->grade = $request->input('nilai'); // Assign the grade value

        // Save the grading to the database
        $grading->save();

        // Redirect the user back to the grading page
        return redirect()->route('guru')->with('success', 'Grading saved successfully.');
    }
}
