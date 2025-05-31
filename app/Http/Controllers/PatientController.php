<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'birthdate' => 'required|date',
        ]);

        $genderToNumber = config('app.gender_to_number');

        Patient::create([
            'name' => $validated['name'],
            'gender' => $genderToNumber[$validated['gender']],
            'birthdate' => date('Y-m-d', strtotime($validated['birthdate'])),
        ]);

        return redirect()->route('patients.index')
            ->with('success', 'Patient added successfully');
    }

    public function create()
    {
        return view('patients.create');
    }

    public function index()
    {
        $patients = Patient::select('id','name','gender','birthdate')
            ->orderBy('id', 'asc')  // Sort by ID in ascending order (oldest first)
            ->paginate(10); // 10 items per page

        $genderToNumber = config('app.gender_to_number');
        $genderToNumber = array_flip($genderToNumber);

        return view('patients.index', compact('patients','genderToNumber'));
    }
}
