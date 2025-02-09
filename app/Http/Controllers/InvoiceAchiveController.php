<?php

namespace App\Http\Controllers;

use App\Models\invoice;

use Illuminate\Http\Request;

class InvoiceAchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = invoice::onlyTrashed()->get();
        return view('invoices.Archive_invoice', compact('invoices'));
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->invoice_id;
        $flight = invoice::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_invoice');
        return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        $invoices = invoice::withTrashed()->where('id', $id)->first();
        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/Archive');
    }
}
