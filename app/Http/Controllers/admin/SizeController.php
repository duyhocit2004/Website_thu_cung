<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::all();

        return view('admin.size.index', compact('color'));
    }

    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255|unique:size,name'
        // ]);

        Size::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('size.index')
            ->with('success', 'Thêm màu thành công');
    }

    public function edit(string $id)
    {
        $size = Size::findOrFail($id);

        return view('admin.size.edit', compact('size'));
    }

    public function update(Request $request, string $id)
    {
        $size = Size::findOrFail($id);

        $size->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('size.index')
            ->with('success', 'Sửa màu sắc thành công');
    }

    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);

        $size->delete();

        return redirect()
            ->route('size.index')
            ->with('success', 'Xóa màu sắc thành công');
    }
}
