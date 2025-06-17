<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conductors = Conductor::all();
        return view('conductors.index', compact('conductors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conductors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:conductors',
            'phone_number' => 'nullable|string|unique:conductors',
            'department_name' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $data['staff_id'] = 'CD-' . rand(100, 999);

        Conductor::create($data);
        return redirect()->route('conductors.index')->with('success', 'Conductor added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conductor $conductor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conductor $conductor)
    {
        return view('conductors.edit', compact('conductor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conductor $conductor)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:conductors,email,' . $conductor->id,
            'phone_number' => 'nullable|string|unique:conductors,phone_number,' . $conductor->id,
            'department_name' => 'required|string|max:255'
        ]);

        $conductor->update($request->all());
        return redirect()->route('conductors.index')->with('success', 'Conductor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conductor $conductor)
    {
        $conductor->delete();
        return redirect()->route('conductors.index')->with('success', 'Conductor deleted successfully.');
    }
}
