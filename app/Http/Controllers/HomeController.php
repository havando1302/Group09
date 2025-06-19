<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product; // <-- Thêm dòng này

class HomeController extends Controller
{
    public function userHome()
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $popularProducts = Product::latest()->take(6)->get();

        return view('home', compact('popularProducts'));
    }

    public function somePage()
    {
        $mainCategory = Category::where('name', 'Sản phẩm')->first();
        return view('yourviewname', compact('mainCategory'));
    }
}
