<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Customer;
use App\Models\Invoice;
use \Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return view('Admin.admins.admin', [
            'admins' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $array = [];
        $array = Arr::add($array,'email', $request->admin_email);
        $array = Arr::add($array, 'password' , bcrypt($request->admin_password));
        $array = Arr::add($array, 'admin_name' , $request->admin_name);
        Admin::create($array);
        return Redirect::route('admin.index');
    }

    public function dashboard() {
        $orders = Invoice::where('invoice_status', 0)->count();
        $user = Customer::count();
        $obj = new Admin();
        $incomeInMonth = $obj->getIncome();
        $incomes = 0;
        foreach ($incomeInMonth as $income) {
            $incomes += $income->price;
        }


        return view('Admin.dashboard', [
            'orders' => $orders,
            'incomes' => $incomes,
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('Admin.admins.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->all());
        return Redirect::route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return Redirect::route('admin.index');
    }

    public function login() {
        return view('Login.Admin.login');
    }

    public function login_process(Request $request) {
        $account = $request->only(['email', 'password']);
        $admin_name = $request->email;
        if(Auth::guard('admin')->attempt($account)){
            $accountadmin = Auth::guard('admin')->user();
            Auth::login($accountadmin);
            session(['admin' => $accountadmin]);
            return Redirect::route('drink.index');
        }else{
           return Redirect::route('admin.login');
        }
    }

    public function logout() {
        Auth::logout();
        session()->forget('admin');
        return Redirect::route('admin.login');
    }
}
