<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $productsDirectory = 'products'; // thư mục con trong storage/app/public/

        // Đảm bảo thư mục storage/app/public/products tồn tại
        if (!Storage::disk('public')->exists($productsDirectory)) {
            Storage::disk('public')->makeDirectory($productsDirectory);
        }

        // Lấy category mặc định (ví dụ category tên "Thời Trang")
        $defaultCategory = Category::firstOrCreate(['name' => 'Thời Trang']);

        $productsData = [
            [
                'name' => 'Gấu Labubu',
                'description' => 'Sản phẩm hot trend nhất năm 2025, được rất nhiều các bạn trẻ săn đón',
                'price' => 280000,
                'stock' => 75,
                'image_url' => 'products/product1.png',
            ],
            [
                'name' => 'Gấu ôm ngủ đang yêu cho nữ',
                'description' => 'Form dáng chuẩn, lông mềm, đẹp',
                'price' => 150000,
                'stock' => 40,
                'image_url' => 'products/product2.png',
            ],
            [
                'name' => 'Gấu đáng yêu',
                'description' => 'Sản phẩm đáng mua nhất trên thị trường',
                'price' => 85000,
                'stock' => 25,
                'image_url' => 'products/product3.png',
            ],
        ];

        foreach ($productsData as &$productDetails) {
            // Gán category_id cho sản phẩm
            $productDetails['category_id'] = $defaultCategory->id;

            // Kiểm tra ảnh có tồn tại trong storage/app/public/products không
            if ($productDetails['image_url'] && !Storage::disk('public')->exists($productDetails['image_url'])) {
                // Nếu không tồn tại file ảnh thì gán null để tránh lỗi
                $productDetails['image_url'] = null;
            }

            // Tạo mới hoặc cập nhật sản phẩm theo tên (unique)
            Product::updateOrCreate(
                ['name' => $productDetails['name']],
                $productDetails
            );
        }
    }
}
