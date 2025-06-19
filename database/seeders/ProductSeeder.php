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
        // Tạo thư mục lưu ảnh nếu chưa có
        $productsDirectory = 'products'; 
        if (!Storage::disk('public')->exists($productsDirectory)) {
            Storage::disk('public')->makeDirectory($productsDirectory);
        }

        // Tạo category mặc định
        $defaultCategory = Category::firstOrCreate(['name' => 'Thời Trang']);

        // Dữ liệu sản phẩm
        $productsData = [
            
                    [
                        'name' => 'Gấu Bông Capy Lulu',
                        'description' => 'Gấu Capy Lulu mềm mịn, đáng yêu – món quà hoàn hảo cho mọi lứa tuổi.',
                        'price' => 280000,
                        'stock' => 75,
                        'image_url' => 'assets/img/product1.png',
                    ],
                    [
                        'name' => 'Gấu Bông Noel Đỏ Thắm',
                        'description' => 'Gấu bông diện trang phục ông già Noel, tạo không khí ấm áp cho mùa Giáng Sinh.',
                        'price' => 150000,
                        'stock' => 40,
                        'image_url' =>'assets/img/product2.png',
                    ],
                    [
                        'name' => 'Gấu Bông Chú Cuội Trăng Rằm',
                        'description' => 'Gấu bông hóa thân thành chú Cuội dễ thương – món quà ý nghĩa cho dịp Trung Thu.',
                        'price' => 120000,
                        'stock' => 35,
                        'image_url' => 'assets/img/product3.png',
                    ],
                    [
                        'name' => 'Gấu Bông Mèo Mũm Mĩm',
                        'description' => 'Gấu bông hình mèo tròn trịa, đáng yêu, là người bạn thân thiết của các bé.',
                        'price' => 99000,
                        'stock' => 50,
                        'image_url' => 'assets/img/product4.png',
                    ],
                    [
                        'name' => 'Gấu Bông Thỏ Tai Dài',
                        'description' => 'Thỏ bông với đôi tai dài và bộ lông mịn màng, mang lại cảm giác êm ái mỗi khi ôm.',
                        'price' => 110000,
                        'stock' => 28,
                        'image_url' => 'assets/img/product5.png',
                    ],
                    [
                        'name' => 'Gấu Bông Chibi Cầu Vồng',
                        'description' => 'Gấu bông nhỏ nhắn, nhiều màu sắc rực rỡ – món quà dễ thương cho bạn bè.',
                        'price' => 75000,
                        'stock' => 60,
                        'image_url' => 'assets/img/product6.png',
                    ],
                ];
                

        foreach ($productsData as &$productDetails) {
            $productDetails['category_id'] = $defaultCategory->id;

            // Nếu ảnh dùng assets/img (ảnh tĩnh) thì không cần kiểm tra tồn tại
            if (!str_starts_with($productDetails['image_url'], 'assets/img')) {
                // Chỉ kiểm tra tồn tại nếu là ảnh lưu trong storage
                if (!Storage::disk('public')->exists($productDetails['image_url'])) {
                    $productDetails['image_url'] = null;
                }
            }

            Product::updateOrCreate(
                ['name' => $productDetails['name']],
                $productDetails
            );
        }
    }
}
