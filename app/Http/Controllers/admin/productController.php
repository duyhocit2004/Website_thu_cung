<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->paginate(10);

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'description' => 'nullable|string',
        //     'category_id' => 'required|exists:categories,id',
        // ]);

        // Create a new product instance
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Handle file upload if needed
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $product->image = 'images/products/' . $filename;
        }

        // Save the product to the database
        $product->save();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product created successfully.');
    }


    public function show(string $id) {}


    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $category = Category::all();

        return view('admin.product.edit', compact('product', 'category'));
    }


    public function update(Request $request, string $id)
    {
        // Validate the request data
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'description' => 'nullable|string',
        //     'category_id' => 'required|exists:categories,id',
        // ]);

        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Xử lý việc cập nhật hình ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu có
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $product->image = 'images/products/' . $filename;
        }

        $product->save();

        return redirect()
            ->route('product.index')
            ->with('success', 'Cập nhật sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công.');
    }
}
