<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        Admin::create($request->all());
        return Redirect::route('admin.index');
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

    public function login_process(\Illuminate\Http\Request $request) {
        $account = $request->only(['email', 'password']);
        if(Auth::guard('admin')->attempt($account)){
//            $accountadmin = Auth::guard('admin')->user();
//            Auth::login($accountadmin);
//            return Redirect::route('drink.index');
            dd('ok');
        }else{
//           return Redirect::route('admin.login');
            dd(' deo ok');
        }
    }
}
