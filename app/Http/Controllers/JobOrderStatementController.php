<?php

namespace App\Http\Controllers;

use App\Models\JobOrder;
use App\Models\JobOrderStatement;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobOrderStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $month = $request->input('month') ?? now()->format('Y-m');

        $jobOrders = JobOrder::with(['contractor', 'conductor', 'typeOfWork'])
            ->whereYear('jos_date', Carbon::parse($month)->year)
            ->whereMonth('jos_date', Carbon::parse($month)->month)
            ->whereDoesntHave('jobOrderStatement')
            ->get()
            ->groupBy(function ($item) {
                return $item->contractor_id . '-' . $item->conductor_id;
            });

        // Fetch existing JOSs for this month
        $existingJOSs = JobOrderStatement::whereMonth('created_at', Carbon::parse($month)->month)
            ->whereYear('created_at', Carbon::parse($month)->year)
            ->get();

        return view('jos.index', compact('jobOrders', 'month', 'existingJOSs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jobOrderIds = explode(',', $request->input('job_order_ids')[0]);

        $jobOrders = JobOrder::whereIn('id', $jobOrderIds)->with('typeOfWork')->get();
        $totalAmount = $jobOrders->sum(fn($jo) => $jo->actual_work_completed * $jo->typeOfWork->rate);
        $totalOrders = $jobOrders->count();
        $paid = $request->input('paid_amount');
        $balance = $totalAmount - $paid;
        $remarks = $request->input('remarks');

        $latestId = JobOrderStatement::count() + 1;
        $ref = 'JOS-' . now()->format('Ym') . '-' . str_pad($latestId, 3, '0', STR_PAD_LEFT);

        DB::beginTransaction();
        try {
            $jos = JobOrderStatement::create([
                'reference_number' => $ref,
                'total_job_orders' => $totalOrders,
                'total_amount' => $totalAmount,
                'paid_amount' => $paid,
                'balance_amount' => $balance,
                'remarks' => $remarks,
            ]);

            foreach ($jobOrders as $jobOrder) {
                $jos->jobOrders()->attach($jobOrder->id);
            }

            DB::commit();
            return redirect()->route('jos.index')->with('success', 'JOS created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jos = JobOrderStatement::with('jobOrders.typeOfWork', 'jobOrders.contractor', 'jobOrders.conductor')
        ->findOrFail($id);

        return view('jos.show', compact('jos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportPDF($id)
    {
        $jos = JobOrderStatement::with('jobOrders.typeOfWork', 'jobOrders.contractor', 'jobOrders.conductor')->findOrFail($id);

        $pdf = Pdf::loadView('jos.pdf', compact('jos'));
        return $pdf->download($jos->reference_number . '.pdf');
    }
}
