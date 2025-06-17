<?php

namespace App\Http\Controllers;

use App\Models\TypeOfWork;
use Illuminate\Http\Request;

class TypeOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeOfWorks = TypeOfWork::all();
        return view('type-of-works.index', compact('typeOfWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type-of-works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric',
            'code' => 'nullable|string|unique:type_of_works',
        ]);
        $data = $request->all();
        $data['code'] = 'TW-' . rand(100, 999);

        TypeOfWork::create($data);
        return redirect()->route('type-of-works.index')->with('success', 'Type of Work created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeOfWork $typeOfWork)
    {
        return view('type-of-works.edit', compact('typeOfWork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeOfWork $typeOfWork)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric',
        ]);
        $typeOfWork->update($request->all());
        return redirect()->route('type-of-works.index')->with('success', 'Type of Work updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeOfWork $typeOfWork)
    {
        $typeOfWork->delete();
        return redirect()->route('type-of-works.index')->with('success', 'Type of Work deleted successfully.');
    }
}
