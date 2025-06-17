<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractors = Contractor::all();
        return view('contractors.index', compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contractors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contractors',
            'phone_number' => 'required|string|unique:contractors',
            'company_name' => 'required|string|unique:contractors',
            'balance' => 'nullable|numeric'
        ]);

        $data = $request->all();
        $data['code'] = 'CTR-' . rand(100, 999);
        Contractor::create($data);

        return redirect()->route('contractors.index')->with('success', 'Contractor added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contractor $contractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contractor $contractor)
    {
        return view('contractors.edit', compact('contractor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contractor $contractor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:contractors,code,' . $contractor->id,
            'email' => 'required|email|unique:contractors,email,' . $contractor->id,
            'phone_number' => 'required|string|unique:contractors,phone_number,' . $contractor->id,
            'company_name' => 'required|string|unique:contractors,company_name,' . $contractor->id,
            'balance' => 'nullable|numeric'
        ]);

        $contractor->update($request->all());
        return redirect()->route('contractors.index')->with('success', 'Contractor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contractor $contractor)
    {
        $contractor->delete();
        return redirect()->route('contractors.index')->with('success', 'Contractor deleted successfully.');
    }
}
