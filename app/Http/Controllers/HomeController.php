<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
class HomeController extends Controller
{
    public function userHome()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Redirect sang route admin.dashboard, nơi sẽ gọi AdminController@dashboard
            return redirect()->route('admin.dashboard');
        }

        return view('home'); // View cho user thường
    }

    public function somePage()
    {
        $mainCategory = Category::where('name', 'Sản phẩm')->first();
        return view('yourviewname', compact('mainCategory'));
    }
}
