<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
        $invoice = Invoice::with('payment', 'customer')->orderBy('invoice_status', 'ASC')->get();
        return view('Admin.invoices.invoice', [
            'invoices' => $invoice
        ]);
    }

    public function new_invoice()
    {
        $invoice = Invoice::with('payment', 'customer')->where('invoice_status', 0)->get();
        return view('Admin.invoices.new-invoice', [
            'invoices' => $invoice
        ]);
    }

    public function income_invoice()
    {
        $invoice = Invoice::with('payment', 'customer')
            ->where('invoice_status', 2)
            ->orWhere('invoice_status', 3)
            ->orderBy('invoice_status', 'ASC')
            ->get();
        return view('Admin.invoices.income-invoice', [
            'invoices' => $invoice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {

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
        $admin_id = Admin::where('email', session('admin.email'))->select('id')->get();
        if($status == 0) {
            Invoice::where('id', $id)->update(['invoice_status' => 1, 'admin_id' => $admin_id[0]->id]);
            flash()->addSuccess('Admin '.session('admin.email').' Duyệt Đơn Hàng Thành Công !');
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
