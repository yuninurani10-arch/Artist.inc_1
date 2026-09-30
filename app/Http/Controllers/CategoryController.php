<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        //validasi
        $validasiData= $request->validate([
            'nama_kategori'=>['required','min:3','max:100'],
            'deskripsi'=>['required'],
        ],[
            'nama_kategori.required'=>'Nama kategori harus diisi',
            'nama_kategori.min'=>'Nama kategori minimal 3 karakter',
            'nama_kategori.max'=>'Nama kategori maximal 100 karakter',
            'deskripsi.required'=>'Deskripsi harus diisi',
        ]);
        //membuat data baru ke model category
        Category::create([
            'nama_kategori'=>$validasiData['nama_kategori'],
            'deskripsi'=>$validasiData['deskripsi'],
        ]);
        //setelah data di simpan
        return redirect()->route('categories.index')->with('success','kategory berhasil ditambahkan');
    }
    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category){
        //validasi
        $validasiData=$request->validate([
            'nama_kategori'=>['required', 'min:3','max:100'],
            'deskripsi'=>['required'],
        ],[
            'nama_kategori.requiredd'=>'Nama kategori harus diisi',
            'nama_kategori.min'=>'Nama kategori minimal 3 karakter',
            'nama_kategori.max'=>'Nama kategori maximal 100 karakter',
            'deskripsi.required'=>'Deskripsi harus di isi',
        ]);
        //mengubah data
        $category->update([
            'nama_kategory'=>$validasiData['nama_kategory'],
            'deskripsi'=>$validasiData['deskripsi'],
        ]);
        return redirect()->route('categories.index')->with('success','kategori berhasil di ubah');
    }
    public function destory(Category $category){
        //menghapus data
        $category->delete();
        return redirect()->route('categories.index')->with('success','kategory berhasil di simpan');
    }
}
