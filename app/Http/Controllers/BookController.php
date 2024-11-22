<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;

class BookController extends Controller
{
    public function index() {
        $posts = DB::table('books')->join('categories', 'category_id', '=', 'categories.id')->select('books.*', 'name')
        ->orderByDesc('id')->limit(10)->get();
   
        return view('home', compact('posts'));
       }
    // Delete
    public function destroy($id) {
        $post = DB::table('books')->find($id);
        DB::table('books')->where('id', $id)->delete();

        return redirect()->route('home', $post->category_id);
    }

   // Form thêm mới
   public function create() {
    // Lấy tất cả danh mục từ bảng categories
    $categories = DB::table('categories')->get();
    
    // Trả về view và truyền danh mục
    return view('create', compact('categories')); 
}

// Lưu dữ liệu
public function store(Request $request) {
    $data = [
          'title' => $request['title'],
          'thumbnail' => $request['thumbnail'],
          'author' => $request['author'],
          'publisher' => $request['publisher'],
          'publication' => $request['publication'],
          'price' => $request['price'],
          'quantity' => $request['quantity'],
          'category_id' => $request['category_id'],
    ];
    DB::table('books')->insert($data);
    return redirect()->route('home');
}

// form edit

public function edit($id) {
    $book = DB:: table('books')->where('id', $id)->first();
    $categories = DB::table('categories')->get();
    return view('edit', compact('book', 'categories'));
}

// Cập nhật dữ liệu
public function update(Request $request) {
    $data = [
          'title' => $request['title'],
          'thumbnail' => $request['thumbnail'],
          'author' => $request['author'],
          'publisher' => $request['publisher'],
          'publication' => $request['publication'],
          'price' => $request['price'],
          'quantity' => $request['quantity'],
          'category_id' => $request['category_id'],
    ];
    DB::table('books')->where('id', $request['id'])->update($data);
    return redirect()->route('home');
}
}
