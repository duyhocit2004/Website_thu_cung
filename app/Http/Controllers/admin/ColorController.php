<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::all();

        return view('admin.color.index', compact('color'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:color,name'
        ]);

        Color::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('color.index')
            ->with('success', 'Thêm màu thành công');
    }

    public function edit(string $id)
    {
        $color = Color::findOrFail($id);

        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request, string $id)
    {
        $color = Color::findOrFail($id);

        $color->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('color.index')
            ->with('success', 'Sửa màu sắc thành công');
    }

    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);

        $color->delete();

        return redirect()
            ->route('color.index')
            ->with('success', 'Xóa màu sắc thành công');
    }
}
