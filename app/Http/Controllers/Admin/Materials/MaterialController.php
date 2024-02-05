<?php

namespace App\Http\Controllers\Admin\Materials;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        $material_data = Material::latest()->where('trash',0)->get();
        return view('Admin.Material.index',[
            'material_data' => $material_data
]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'string|max:255',
        ]);

        Material::create([
            'material_name' => $request->input('material_name'),
        ]);

        return back()->with('success', 'Category added successfully!');
    }
    public function trash(string $id)
    {
        $data =  Material::findorFail($id);

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
