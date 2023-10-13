<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Payment;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice = Invoice::with('payment', 'customer')->orderBy('invoices.id', 'DESC')->get();
        return view('Admin.invoices.invoice', [
            'invoices' => $invoice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment = Payment::all();
        return view('Admin.invoices.create', [
           'payments' => $payment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $array = array();
        $array = Arr::add($array, 'invoice_date', $request->date);
        $array = Arr::add($array, 'customer_name', $request->customer);
        $array = Arr::add($array, 'address', $request->address);
        $array = Arr::add($array, 'payment_id', $request->payment);
        $array = Arr::add($array, 'invoice_status', 1);
        $array = Arr::add($array, 'invoice_type', 1);
        $array = Arr::add($array, 'customer_id', 12);
        $array = Arr::add($array, 'admin_id', 4);

        Invoice::create($array);
        return Redirect::route('invoice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $id = $request->id;
        $status = $request->status;
        if($status == 0) {
            Invoice::where('id', $id)->update(['invoice_status' => 1]);
            flash()->addSuccess('Duyệt Đơn Hàng Thành Công !');
        }else {
            flash()->addError('Duyệt Đơn Hàng Không Thành Công, Đơn Hàng Đã Được Duyệt !');
        }
        return Redirect::route('invoice.index');
    }

    public function updateShipping(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $id = $request->id;
        $status = $request->status;
        if($status == 1) {
            Invoice::where('id', $id)->update(['invoice_status' => 2]);
            flash()->addSuccess('Đơn Hàng Đã Được Giao Thành Công !');
        }else {
            flash()->addError('Cập Nhật Đơn Hàng Không Thành Công, Đơn Hàng Đã Được Giao Hoặc Chưa Được Duyệt !');
        }
        return Redirect::route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
