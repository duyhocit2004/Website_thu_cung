<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = Size::all();
        
        return view('size.index', compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        Size::create($request->validated());
        return redirect()->route('size.index')
            ->with('success', 'Size đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return view('size.show', compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        return redirect()->route('size.index')
            ->with('success', 'Size đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('size.index')
            ->with('success', 'Size đã được xóa thành công.');
    }
}
