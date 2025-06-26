<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('category.index')
            ->with('success', 'Thêm danh mục thành công');
    }


    public function show(string $id)
    {
        $category = Category::find($id);

        return view('admin.category.show', compact('category'));
    }


    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()
            ->route('category.index')
            ->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Xóa danh mục thành công');
    }
}
