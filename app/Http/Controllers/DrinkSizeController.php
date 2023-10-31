<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\DrinkSize;
use App\Http\Requests\StoreDrinkSizeRequest;
use App\Http\Requests\UpdateDrinkSizeRequest;
use App\Models\Size;
use http\Env\Request;
use Illuminate\Support\Facades\Redirect;

class DrinkSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinksize = DrinkSize::with('drink', 'size')->get();
        return view('Admin.drinksizes.drinksize', [
            'drinksizes' => $drinksize
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sizes = Size::all();
        $drinks = Drink::all();
        return view('Admin.drinksizes.create', [
            'sizes' => $sizes,
            'drinks' => $drinks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrinkSizeRequest $request)
    {
        DrinkSize::create($request->all());
        flash()->addSuccess('Thêm Thành Công');
        return Redirect::route('drinksize.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DrinkSize $drinkSize)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DrinkSize $drinkSize)
    {

        $sizes = Size::all();
        $drinks = Drink::all();
        return view('Admin.drinksizes.edit', [
            'drinksizes' => $drinkSize,
            'sizes' => $sizes,
            'drinks' => $drinks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrinkSizeRequest $request, DrinkSize $drinkSize)
    {
        $drinkSize->update($request->all());
        flash()->addSuccess('Cập Nhật Thành Công');
        return Redirect::route('drinksize.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DrinkSize $drinkSize)
    {
        $drinkSize->delete();
        flash()->addSuccess('Xóa Thành Công');
        return Redirect::route('drinksize.index');
    }
}
