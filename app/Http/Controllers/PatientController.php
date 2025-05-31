<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController
{
    public function create(Request $request)
    {
        // BUG: missing validation
        $data = $request->all();
        // BUG: undefined model reference
        Patient::create($data);

        return redirect('/patients')->with('success','Patient added');
    }

    public function store()
    {
        // BUG: wrong variable name $patientsx
        $patients = Patient::select('id','name','gender','birthdate')->get();

        return view('patients.index', compact('patientsx'));
    }
}
