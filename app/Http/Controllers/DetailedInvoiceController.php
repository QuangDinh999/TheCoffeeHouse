<?php

namespace App\Http\Controllers;

use App\Models\DetailedInvoice;
use App\Http\Requests\StoreDetailedInvoiceRequest;
use App\Http\Requests\UpdateDetailedInvoiceRequest;
use App\Models\Drink;
use App\Models\DrinkSize;
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
        $drink = Drink::with('category')->get();
        return view('Admin.invoices.create_detail_invoice', [
            'drinks' => $drink
        ]);
    }

    public function drink_detail(Request $request) {
        $drinksize = DrinkSize::where('drink_id', $request->id)->get();
        return view('Admin.invoices.drink_detail', [
            'drinksizes' => $drinksize
        ]);
    }

    public function add_drink_detail(Request $request) {
        $id = $request->id;
        $quantity = $request->quantity;
        if(session()->has('invoice')){
            $invoice = session('invoice');
            if(isset($invoice[$id])){
                $invoice[$id]+= $quantity;
            }else{
                $invoice[$id] = $quantity;
            }
            session(['invoice' => $invoice]);
        }else{
            $invoice = [];
            $invoice[$id] = $quantity;
            session(['invoice' => $invoice]);
        }
        flash()->addSuccess('Thêm sản phẩm thành công vào hóa đơn');
        return Redirect::back();
    }

    public function delete_detail() {
        session()->forget('invoice');
        $invoice = array();
        session(['invoice' => $invoice]);
        return Redirect::back();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetailedInvoiceRequest $request)
    {
        $obj = new DetailedInvoice();
        $obj->payment = $request->payment;
        $obj->name = $request->customer;
        $obj->address = $request->address;
        $obj->date = $request->date;

        $result = $obj->store();
        if($result == 1){
            flash()->addSuccess('Thêm Hóa Đơn Thành Công !');
        }else {
            flash()->addError('Chưa Thêm sản phẩm vào Hóa Đơn');
        }
        return Redirect::route('invoice.create_detail');
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
