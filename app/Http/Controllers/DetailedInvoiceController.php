<?php

namespace App\Http\Controllers;

use App\Models\DetailedInvoice;
use App\Http\Requests\StoreDetailedInvoiceRequest;
use App\Http\Requests\UpdateDetailedInvoiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DetailedInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $obj = new DetailedInvoice();
        $obj->id = $request->id;
        $detail_invoice = $obj->index();

        return view('Admin.invoices.detail_invoice', [
            'detail_invoice' => $detail_invoice
        ]);
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
    public function store(StoreDetailedInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailedInvoice $detailedInvoice)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailedInvoice $detailedInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailedInvoiceRequest $request, DetailedInvoice $detailedInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailedInvoice $detailedInvoice)
    {
        //
    }
}
