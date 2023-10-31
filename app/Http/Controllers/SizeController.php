<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Support\Facades\Redirect;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::all();
        return view('Admin.sizes.size', [
            'sizes' => $sizes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $data = $request->all();
        Size::create($data);
        flash()->addSuccess('Thêm Thành Công');
        return Redirect::route('size.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('Admin.sizes.edit', [
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update($request->all());
        flash()->addSuccess('Cập Nhật Thành Công');
        return Redirect::route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        flash()->addSuccess('Xóa Thành Công');
        return Redirect::route('size.index');
    }
}
