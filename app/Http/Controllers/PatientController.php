<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'birth_date' => 'required|date',
        ]);

        Patient::create([
            'name' => $validated['name'],
            'gender' => $validated['gender'],
            'birth_date' => $validated['birth_date'],
        ]);

        return redirect()->route('patients.index')
            ->with('success', 'Patient added successfully');
    }

    public function index()
    {
        $patients = Patient::select('id','name','gender','birthdate')->get();

        return view('patients.index', compact('patients'));
    }
}
