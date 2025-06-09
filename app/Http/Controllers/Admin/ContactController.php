<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        // Chỉ admin mới có quyền thao tác CRUD
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Hiển thị danh sách liên hệ (cho admin)
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            // Nếu là admin, hiển thị danh sách liên hệ để quản lý
            $contacts = Contact::where('role', 'admin')->get();
            return view('admin.contacts.index', compact('contacts'));
        } else {
            // Nếu là user hoặc guest, hiển thị contact cho người dùng
            $contact = Contact::where('role', 'user')->first() ?? Contact::where('role', 'admin')->first();
            return view('contact', compact('contact'));
        }
    }
    

    /**
     * Hiển thị form thêm liên hệ mới
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Lưu liên hệ mới vào CSDL
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotline'     => 'required',
            'email'       => 'required|email',
            'facebook'    => 'required',
            'address'     => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['role'] = 'admin'; // gán role admin

        Contact::create($data);

        return redirect()->route('admin.contacts.index')->with('success', 'Thêm thông tin liên hệ thành công.');
    }

    /**
     * Hiển thị form chỉnh sửa liên hệ
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Cập nhật thông tin liên hệ
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'hotline'     => 'required',
            'email'       => 'required|email',
            'facebook'    => 'required',
            'address'     => 'required',
            'description' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Cập nhật thông tin liên hệ thành công.');
    }

    /**
     * Xóa thông tin liên hệ
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Xóa thông tin liên hệ thành công.');
    }
}
