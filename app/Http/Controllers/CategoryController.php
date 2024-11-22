<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create()
{
    // Lấy tất cả các danh mục từ bảng categories
    $categories = DB::table('categories')->get();

    // Trả về view và truyền biến categories
    return view('create', compact('categories'));
}
}
