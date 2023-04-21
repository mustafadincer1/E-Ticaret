<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $tmp = Category::orderByDesc('olusturma_tarihi')->paginate(7);;
        return view('admin.kategori.index',compact('tmp'));
    }

    public function edit($id){
        $category= Category::find($id);
        $categories = Category::all();


        return view('admin.kategori.edit',compact('category','categories'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'category_name' => 'required'

        ]);
        $category = Category::find($id);
 
        $category->update(['kategori_adi' => $request->category_name,'slug' => $request->slug,
        'üst_id' => $request->üst_id]);

        return redirect()->route('admin.kategori.edit',$id)
            ->with('message','Kategori Güncellendi')
            ->with('message_type','success');
    }
    public function add(){
        $categories = Category::all();
        return view('admin.kategori.add',compact('categories'));
    }
    public function save(Request $request1){
        $request1->validate([
            'category_name' => 'required'

        ]);

        Category::create(['kategori_adi' => $request1->category_name,'slug' => $request1->slug,
        'üst_id' => $request1->üst_id]);

        return redirect()->route('admin.kategori')
            ->with('message','Kategori Eklendi')
            ->with('message_type','success');

    }
    public function delete($id){
        $category = Category::find($id);
        $category->products()->detach();
        Category::destroy($id);
        return redirect()->route('admin.kategori')
            ->with('message','Kategori Silindi')
            ->with('message_type','success');
    }
}
