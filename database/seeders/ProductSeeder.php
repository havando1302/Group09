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
                'name' => 'Áo Phông Cotton Cao Cấp',
                'description' => 'Chất liệu cotton thoáng mát, thiết kế trẻ trung, phù hợp cho mọi hoạt động.',
                'price' => 280000,
                'stock' => 75,
                'image_url' => 'products/ao-phong-cotton.jpg',
            ],
            [
                'name' => 'Quần Tây Công Sở Lịch Lãm',
                'description' => 'Form dáng chuẩn, vải không nhăn, mang lại vẻ chuyên nghiệp và tự tin.',
                'price' => 450000,
                'stock' => 40,
                'image_url' => 'products/quan-tay-cong-so.jpg',
            ],
            [
                'name' => 'Giày Thể Thao NIKE Air Max',
                'description' => 'Công nghệ Air Max êm ái, thiết kế năng động, siêu nhẹ và bền bỉ.',
                'price' => 1850000,
                'stock' => 25,
                'image_url' => 'products/giay-nike-air-max.jpg',
            ],
            [
                'name' => 'Kính Mát Thời Trang Chống UV',
                'description' => 'Bảo vệ mắt tối ưu khỏi tia UV, gọng kính chắc chắn, kiểu dáng hiện đại.',
                'price' => 350000,
                'stock' => 60,
                'image_url' => 'products/kinh-mat-chong-uv.jpg',
            ],
            [
                'name' => 'Đồng Hồ Thông Minh Z-Series',
                'description' => 'Theo dõi sức khỏe, thông báo tiện lợi, pin trâu, chống nước.',
                'price' => 1200000,
                'stock' => 30,
                'image_url' => null,
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
