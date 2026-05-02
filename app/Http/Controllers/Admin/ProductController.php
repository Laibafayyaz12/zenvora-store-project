<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    // 📦 PRODUCTS PAGE
    public function index()
    {
        return view('admin.products.index');
    }

    // ✅ DATATABLE DATA (FULL)
    public function data()
    {
        $products = Product::latest();

        return DataTables::of($products)
            ->addIndexColumn()

            ->addColumn('image', function ($row) {
                if ($row->image) {
                    return '<img src="/storage/' . $row->image . '" width="50">';
                }
                return 'No Image';
            })

            ->addColumn('category', function ($row) {
                return $row->category ?? 'N/A';
            })

            ->addColumn('stock', function ($row) {
                return $row->stock ?? 0;
            })

            ->addColumn('action', function ($row) {

                return '
                    <a href="/admin/products/' . $row->id . '/edit"
                       style="background:gold;color:black;padding:5px 10px;margin-right:5px;">
                       Edit
                    </a>

                    <form method="POST" action="/admin/products/' . $row->id . '" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button style="background:red;color:white;padding:5px 10px;border:none;">
                            Delete
                        </button>
                    </form>
                ';
            })

            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    // ➕ CREATE FORM
    public function create()
    {
        return view('admin.products.create');
    }

    // 💾 STORE PRODUCT
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'category' => 'nullable|string|max:100',
            'stock' => 'nullable|numeric'
        ]);

        // image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    // ✏️ EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // 🔄 UPDATE
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'category' => 'nullable|string|max:100',
            'stock' => 'nullable|numeric'
        ]);

        // image update
        if ($request->hasFile('image')) {

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    // 🗑️ DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}