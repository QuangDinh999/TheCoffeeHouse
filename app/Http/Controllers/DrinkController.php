<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drink;
use App\Http\Requests\StoreDrinkRequest;
use App\Http\Requests\UpdateDrinkRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drink = Drink::with('category')->get();
        return view('Admin.drinks.drink', [
            'drinks' => $drink
        ]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('Admin.drinks.create', [
            'categories' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrinkRequest $request)
    {

        $image_name = $request->file('image')->getClientOriginalName();
        Storage::putFileAs('public/Drink', $request->file('image'), $image_name);
        $obj = new Drink();
        $obj->drink = $request->drink_name;
        $obj->image = $image_name;
        $obj->description = $request->description;
        $obj->category_id = $request->category_id;
        $obj->store();
        return Redirect::route('drink.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drink $drink)
    {
        $category = Category::all();
        return view('Admin.drinks.edit', [
            'drink' => $drink,
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrinkRequest $request, Drink $drink)
    {
        $drink->update($request->all());
        return Redirect::route('drink.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();
        return Redirect::route('drink.index');
    }
}
