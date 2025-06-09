<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only([
            'create', 'store', 'edit', 'update', 'destroy',
            'createVariant', 'storeVariant', 'editVariant', 'updateVariant', 'destroyVariant'
        ]);
    }

    public function index(Request $request)
    {
        $categoryId = $request->query('category_id');
        $query = Product::with('variants');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::whereNotNull('parent_id')->get();
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return view('admin.products.index', compact('products', 'categories', 'categoryId'));
        }

        return view('products.index', compact('products', 'categories', 'categoryId'));
    }

        /**
         * Hiển thị trang chi tiết sản phẩm.
         *
         * @param  int  $id
         * @return \Illuminate\View\View
         */
        public function show($id)
        {
            // 1. Tải sản phẩm cùng với các quan hệ cần thiết một cách hiệu quả (Eager Loading)
            // Lấy tất cả các biến thể (variants) và từ đó lấy thông tin màu (color) và kích thước (size)
            // findOrFail sẽ tự động trả về lỗi 404 nếu không tìm thấy sản phẩm.
            $product = Product::with('variants.color', 'variants.size')->findOrFail($id);
    
            // 2. Trích xuất danh sách các màu sắc duy nhất từ các biến thể của sản phẩm
            // - `map()` lặp qua mỗi biến thể để lấy đối tượng 'color'.
            // - `filter()` loại bỏ các kết quả null (nếu có biến thể không có màu).
            // - `unique('id')` đảm bảo mỗi màu chỉ xuất hiện một lần.
            // - `values()` reset lại key của collection để bắt đầu từ 0.
            $colors = $product->variants
                ->map(fn($variant) => $variant->color)
                ->filter()
                ->unique('id')
                ->values();
    
            // 3. Tương tự, trích xuất danh sách các kích thước duy nhất
            $sizes = $product->variants
                ->map(fn($variant) => $variant->size)
                ->filter()
                ->unique('id')
                ->values();
    
            // 4. Lấy toàn bộ collection các biến thể để truyền sang view.
            // Cấu trúc này (`[{color_id, size_id, stock}, ...]`) rất linh hoạt cho JavaScript
            // và dễ dàng mở rộng trong tương lai (ví dụ: thêm giá riêng cho từng biến thể).
            $variants = $product->variants;
            
            // 5. Kiểm tra quyền của người dùng để quyết định hiển thị view nào
            $user = Auth::user();
            $viewName = ($user && $user->role === 'admin') ? 'admin.products.show' : 'products.show';
    
            // 6. Trả về view cùng với các dữ liệu cần thiết
            // Sử dụng `compact` để truyền biến một cách gọn gàng.
            return view($viewName, compact('product', 'colors', 'sizes', 'variants'));
        }
    
        // Các phương thức khác của controller...

    
    
    



    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.products.create', compact('categories', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'required|image|max:2048',
            'variants' => 'required|array|min:1',
            'variants.*.color_name' => 'required|string|max:255',
            'variants.*.size_name' => 'required|string|max:255',
            'variants.*.stock' => 'required|integer|min:0',
        ]);
    
        // Upload ảnh
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('products', 'public');
            $validated['image_url'] = $path;
        }
    
        // Tạo sản phẩm
        $product = Product::create([
            'name' => $validated['name'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
        ]);
    
        // Tạo biến thể
        foreach ($validated['variants'] as $variant) {
            $product->variants()->create([
                'color_name' => $variant['color_name'],
                'size_name' => $variant['size_name'],
                'stock' => $variant['stock'],
            ]);
        }
    
        // Redirect về index với thông báo
        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }
    
    public function edit($id)
    {
        $product = Product::with('variants')->findOrFail($id);
        $categories = Category::whereNotNull('parent_id')->get();
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.products.edit', compact('product', 'categories', 'colors', 'sizes'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|max:2048',
            'variants.*.color_name' => 'required|string|max:100',
            'variants.*.size_name' => 'required|string|max:50',
            'variants.*.stock' => 'required|integer|min:0',
        ]);
    
        // Cập nhật thông tin sản phẩm chính
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
    
        // Xử lý upload ảnh mới nếu có
        if ($request->hasFile('image_url')) {
            // Xóa ảnh cũ nếu cần, hoặc để Laravel xử lý
            if ($product->image_url) {
                Storage::delete($product->image_url);
            }
            $path = $request->file('image_url')->store('products');
            $product->image_url = $path;
        }
    
        $product->save();
    
        // Xử lý biến thể sản phẩm
        $variants = $request->input('variants', []);
    
        // Lấy tất cả variant IDs hiện có của sản phẩm để đối chiếu
        $existingVariantIds = $product->variants()->pluck('id')->toArray();
    
        $receivedVariantIds = [];
    
        foreach ($variants as $variantData) {
            if (!empty($variantData['id']) && in_array($variantData['id'], $existingVariantIds)) {
                // Cập nhật biến thể đã tồn tại
                $variant = $product->variants()->find($variantData['id']);
                $variant->color_name = $variantData['color_name'];
                $variant->size_name = $variantData['size_name'];
                $variant->stock = $variantData['stock'];
                $variant->save();
    
                $receivedVariantIds[] = $variantData['id'];
            } else {
                // Tạo biến thể mới
                $product->variants()->create([
                    'color_name' => $variantData['color_name'],
                    'size_name' => $variantData['size_name'],
                    'stock' => $variantData['stock'],
                ]);
            }
        }
    
        // Xóa những biến thể không có trong danh sách gửi lên (biến thể bị xóa trong form)
        $variantsToDelete = array_diff($existingVariantIds, $receivedVariantIds);
        if (count($variantsToDelete) > 0) {
            $product->variants()->whereIn('id', $variantsToDelete)->delete();
        }
    
        // Redirect về trang index sản phẩm với flash message thành công
        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
        public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa ảnh
        if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
            Storage::disk('public')->delete($product->image_url);
        }

        // Xóa biến thể
        $product->variants()->delete();

        // Xóa sản phẩm
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã bị xóa.');
    }

    // ==========================
    // Quản lý biến thể sản phẩm
    // ==========================

    public function createVariant($productId)
    {
        $product = Product::findOrFail($productId);
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.products.variants.create', compact('product', 'colors', 'sizes'));
    }

    public function storeVariant(Request $request, $productId)
    {
        $request->validate([
            'color_id' => 'required|exists:colors,id',
            'size_id'  => 'required|exists:sizes,id',
            'stock'    => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($productId);

        $product->variants()->create([
            'color_id' => $request->color_id,
            'size_id'  => $request->size_id,
            'stock'    => $request->stock,
        ]);

        return redirect()->route('admin.products.edit', $productId)->with('success', 'Biến thể đã được thêm.');
    }

    public function editVariant($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.products.variants.edit', compact('variant', 'colors', 'sizes'));
    }

    public function updateVariant(Request $request, $id)
    {
        $request->validate([
            'color_id' => 'required|exists:colors,id',
            'size_id'  => 'required|exists:sizes,id',
            'stock'    => 'required|integer|min:0',
        ]);

        $variant = ProductVariant::findOrFail($id);
        $variant->update([
            'color_id' => $request->color_id,
            'size_id'  => $request->size_id,
            'stock'    => $request->stock,
        ]);

        return redirect()->route('admin.products.edit', $variant->product_id)->with('success', 'Biến thể đã được cập nhật.');
    }

    public function destroyVariant($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $productId = $variant->product_id;
        $variant->delete();

        return redirect()->route('admin.products.edit', $productId)->with('success', 'Biến thể đã bị xóa.');
    }
}
