<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function __construct()
{
    $this->middleware('is_admin')->only(['edit', 'update', 'destroy']);
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->except('Photo');
        if ($request->hasFile('Photo')) {
            $file = $request->file('Photo');
            $name = $file->getClientOriginalName();
            
            // Перемещаем файл в public/photos и сохраняем имя файла
            $file->move(public_path('photos/patient'), $name);
            $input['Photo'] = "photos/patient/{$name}";
        }
        else{
            $input['Photo'] = "photos/inc/account.jpg";
        }
        $patient = Patient::create($input);
        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $patient = Patient::findOrFail($id);
        $input = $request->except('Photo');
        if ($request->hasFile('Photo')) {
            $file = $request->file('Photo');
            $name = $file->getClientOriginalName();
            
            // Перемещаем файл в public/photos и сохраняем имя файла
            $file->move(public_path('photos/patient'), $name);
            $input['Photo'] = "photos/patient/{$name}";
        }
        $patient->update($input);
        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patient.index');
    }
}
