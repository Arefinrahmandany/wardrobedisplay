<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->where('trash',0)->get();
        return view('Admin.Category.index',[
            'category_data' => $category
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'string|max:255',
        ]);

        Category::create([
            'category_name' => $request->input('category_name'),
        ]);

        return back()->with('success', 'Category added successfully!');
    }


    public function trash(string $id)
    {
        $data =  Category::findorFail($id);

        if($data -> trash){
            $data -> update([
                'trash'=>false
            ]);
        }else{
            $data -> update([
                'trash'=>true
            ]);
        }

        return back()->with('danger-table','Your Brand Data Destroy Successfully');
    }

}
