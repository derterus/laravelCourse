<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors; // Предполагается, что у вас есть модель Doctor

class DoctorsController extends Controller
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
        $doctors = Doctors::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
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
            $file->move(public_path('photos/doctors'), $name);
            $input['Photo'] = "photos/doctors/{$name}";
        }
        else{
            $input['Photo'] = "photos/inc/account.jpg";
        }
        $doctor = Doctors::create($input);
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctors::findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctors::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $doctor = Doctors::findOrFail($id);
        $input = $request->except('Photo');
        if ($request->hasFile('Photo')) {
            $file = $request->file('Photo');
            $name = $file->getClientOriginalName();
            
            // Перемещаем файл в public/photos и сохраняем имя файла
            $file->move(public_path('photos/doctors'), $name);
            $input['Photo'] = "photos/doctors/{$name}";
        }
        $doctor->update($input);
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctors::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
