<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = Size::all();

        return view('admin.size.index', compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:size,name'
        ]);

        Size::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('size.index')
            ->with('success', 'Thêm size thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return view('size.show', compact('size'));
    }

    public function edit(string $id)
    {
        $size = Size::findOrFail($id);

        return view('admin.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size = Size::findOrFail($id);

        $size->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('size.index')
            ->with('success', 'Sửa size thành công');
    }


    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);

        $size->delete();

        return redirect()

            ->route('size.index')

            ->with('success', 'Xóa size thành công');
    }
}
