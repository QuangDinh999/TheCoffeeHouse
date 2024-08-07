<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drink;
use App\Http\Requests\StoreDrinkRequest;
use App\Http\Requests\UpdateDrinkRequest;
use App\Models\DrinkSize;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        if(!Storage::exists('public/Drink'. $image_name)){
            Storage::putFileAs('public/Drink', $request->file('image'), $image_name);
        }
        $obj = new Drink();
        $obj->drink = $request->drink_name;
        $obj->image = $image_name;
        $obj->description = $request->description;
        $obj->category_id = $request->category_id;
        $obj->store();
        flash()->addSuccess('Thêm Thành Công');
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
        if ($request->file('image') != null) {
            $image_name = $request->file('image')->getClientOriginalName();
            if(!Storage::exists('public/Drink'. $image_name)){
                Storage::putFileAs('public/Drink', $request->file('image'), $image_name);
            }
        }else{
            $image_name = $drink->image;
        }

        $array = array();
        $array =Arr::add($array, 'drink_name', $request->drink_name);
        $array =Arr::add($array, 'description', $request->description);
        $array =Arr::add($array, 'category_id', $request->category_id);
        $array =Arr::add($array, 'image', $image_name);

        $drink->update($array);
        flash()->addSuccess('Cập Nhật Thành Công');
        return Redirect::route('drink.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        DrinkSize::where('drink_id', $drink->id)->delete();
        $drink->delete();
        flash()->addSuccess('Xóa Thành Công');
        return Redirect::route('drink.index');
    }

    public function size_detail(Request $request) {
        $id = $request->id;
        $size = DrinkSize::with('drink')->where('drink_id', $id)->get();
        return view('Admin.drinks.drinksize', [
           'drinksizes' => $size
        ]);
    }
}
