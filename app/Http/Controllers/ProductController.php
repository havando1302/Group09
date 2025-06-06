<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        // Chỉ admin có thể truy cập các chức năng quản lý sản phẩm
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Hiển thị danh sách sản phẩm (admin và người dùng)
     * Có thể lọc theo danh mục con thông qua query: ?category_id=...
     */
    public function index(Request $request)
    {
        $categoryId = $request->query('category_id');

        $productsQuery = Product::query();

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        // Danh sách danh mục con dùng cho menu lọc
        $categories = Category::whereNotNull('parent_id')->get();

        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return view('admin.products.index', compact('products', 'categories', 'categoryId'));
        }

        return view('products.index', compact('products', 'categories', 'categoryId'));
    }

    /**
     * Hiển thị chi tiết sản phẩm
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return view('admin.products.show', compact('product'));
        }

        return view('products.show', compact('product'));
    }

    /**
     * Hiển thị form tạo sản phẩm mới (admin)
     */
    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Lưu sản phẩm mới vào DB (admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url'   => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048',
        ]);

        $product = new Product($request->except('image_url'));

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('products', 'public');
            $product->image_url = $path;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm.');
    }

    /**
     * Hiển thị form chỉnh sửa sản phẩm (admin)
     */
    public function edit(Product $product)
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật sản phẩm (admin)
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url'   => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048',
        ]);

        $product->fill($request->except('image_url'));

        if ($request->hasFile('image_url')) {
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url);
            }

            $path = $request->file('image_url')->store('products', 'public');
            $product->image_url = $path;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }

    /**
     * Xóa sản phẩm (admin)
     */
    public function destroy(Product $product)
    {
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã bị xóa.');
    }
}
