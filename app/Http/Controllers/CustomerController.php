<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('Admin.customers.customer', [
            'customers' => $customer
        ]);
    }

    public function Login() {
        return view('Login.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $array = array();
        $array = Arr::add($array, 'cus_name', $request->cus_name);
        $array = Arr::add($array, 'email', $request->cus_email);
        $array = Arr::add($array, 'password', bcrypt($request->cus_password));
        $array = Arr::add($array, 'phone', $request->phone);
        $array = Arr::add($array, 'address', $request->address);
        Log::info('Customer Array:', $array);

        Customer::create($array);
        
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('Admin.customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        flash()->addSuccess('Cập Nhật Thành Công');
        return Redirect::route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        flash()->addSuccess('Xóa Thành Công');
        return Redirect::route('customer.index');
    }

    public function loginCustomer() {
        return view('Login.Customer.login');
    }

    public function loginCustomer_process(\Illuminate\Http\Request $request) {
        $accountCustomer = $request->only(['email', 'password']);
        if(Auth::guard('customer')->attempt($accountCustomer)){
            $account = Auth::guard('customer')->user();
            Auth::login($account);
            session(['customer' => $account]);
            return Redirect::route('CoffeeHouse');
        }else{
            return Redirect::route('customer.login');
        }
    }

    public function logout() {
        Auth::logout();
        session()->forget('customer');
        return Redirect::route('customer.login');
    }
}
