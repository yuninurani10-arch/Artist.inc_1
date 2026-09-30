<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('products.index', compact('products'));
    }
    public function create(){
        $categories=Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request){
        //vslidasi
        $validasiData=$request->validate([
            'category_id'=>['required'],
            'nama_produk'=>['required','min:3','max:100'],
            'deskripsi'=>['required'],
            'harga'=>['required', 'integer'],
            'stok'=>['required', 'integer'],
            'is_active'=>['required'],
        ],[
          'category_id.required'=>'kategori harus di pilih',
          'nama_produk.required'=>'nama produk harus dimisi',
          'nama_produk.min'=>'nama produk minimal 3 karakter',
          'nama_produk.max'=>'nama produk maximal 100 karakter',
          'deskripsi.required'=>"deskripsi harus di isi",
          'harga.required'=>'harga harus di isi',
          'harga.integer'=>'harga harus diisi',
          'stok.required'=>'stok harus angka',
          'stok.integer'=>'stok harus berupa angka',
          'is_active.required'=>'status produk harus di pilih',  
        ]);
        //membuat data baru ke model product
        Product::create([
            'category_id'=>$validasiData['category_id'],
            'nama_produk'=>$validasiData['nama_produk'],
            'deskripsi'=>$validasiData['deskripsi'],
            'harga'=>$validasiData['harga'],
            'stok'=>$validasiData['stok'],
            'is_active'=>$validasiData['is_active'],
        ]);
        return redirect()->route('products.index')->with('success','produk berhasil ditambahkan');
    }
    public function edit(Product $product){
        $categories=Category::all();
        return view ('products.edit', compact('product','categories'));
    }
    public function update(Request $request, Product $product){
        //validasi
        $validasiData=$request->validate([
            'category_id'=>['required'],
            'nama_produk'=>['required','min:3','max:100'],
            'deskripsi'=>['required'],
            'harga'=>['required', 'integer'],
            'stok'=>['required','integer'],
            'is_active'=>['required'],
        ]);
        //mengubah data
        $product->update([
            'category_id'=>$validasiData['category_id'],
            'nama_produk'=>$validasiData['nama_produk'],
            'deskripsi'=>$validasiData['deskripsi'],
            'harga'=>$validasiData['harga'],
            'stok'=>$validasiData['stok'],
            'is_active'=>$validasiData['is_active'],
        ]);
        return redirect()->route('product.index')->with('success','produk berhasil di ubah');
    }
    public function destroy(Product $product){
        //menghaps data
        $product->delete();
        return redirect()->route('product.index')->with('success','produk berhasil dihapus');
    }
}
