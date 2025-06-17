<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Contractor;
use App\Models\JobOrder;
use App\Models\TypeOfWork;
use Illuminate\Http\Request;

class JobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobOrders = JobOrder::with(['contractor', 'conductor', 'typeOfWork'])->get();
        return view('job-orders.index', compact('jobOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contractors = Contractor::all();
        $conductors = Conductor::all();
        $typeOfWorks = TypeOfWork::all();
        return view('job-orders.create', compact('contractors', 'conductors', 'typeOfWorks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'jos_date' => 'required|date',
            'type_of_work_id' => 'required|exists:type_of_works,id',
            'contractor_id' => 'required|exists:contractors,id',
            'conductor_id' => 'required|exists:conductors,id',
            'actual_work_completed' => 'required|numeric',
            'remarks' => 'required|string',
        ]);

        $data = $request->all();
        $data['reference_number'] = 'JO-' . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

        JobOrder::create($data);
        return redirect()->route('job-orders.index')->with('success', 'Job Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobOrder $jobOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOrder $jobOrder)
    {
        $contractors = Contractor::all();
        $conductors = Conductor::all();
        $typeOfWorks = TypeOfWork::all();
        return view('job-orders.edit', compact('jobOrder', 'contractors', 'conductors', 'typeOfWorks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOrder $jobOrder)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'jos_date' => 'required|date',
            'type_of_work_id' => 'required|exists:type_of_works,id',
            'contractor_id' => 'required|exists:contractors,id',
            'conductor_id' => 'required|exists:conductors,id',
            'actual_work_completed' => 'required|numeric',
            'remarks' => 'required|string',
        ]);

        $jobOrder->update($request->all());
        return redirect()->route('job-orders.index')->with('success', 'Job Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOrder $jobOrder)
    {
        $jobOrder->delete();
        return redirect()->route('job-orders.index')->with('success', 'Job Order deleted successfully.');
    }
}
