<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Đảm bảo đã import Category model
use Illuminate\Support\Str; // Đảm bảo đã import Str facade

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo danh mục "Sản phẩm" nếu nó chưa tồn tại
        if (!Category::where('slug', 'san-pham')->exists()) {
            Category::create([
                'name' => 'Sản phẩm',
                'slug' => 'san-pham',
                'parent_id' => null,
            ]);
        }

       
         $rootCategory = Category::where('slug', 'san-pham')->first();
         if ($rootCategory) {
             if (!Category::where('slug', 'Gau-be')->exists()) {
                Category::create([
                    'name' => 'Gấu cho bé gái',
                     'slug' => 'Gau-be',
                     'parent_id' => $rootCategory->id,
                 ]);
            }
             if (!Category::where('slug', 'Gau-nam')->exists()) {
                 Category::create([
                     'name' => 'Gấu cho bé nam',
                     'slug' => 'Gau-nam',
                    'parent_id' => $rootCategory->id,
                 ]);
           }
         }
    }
}