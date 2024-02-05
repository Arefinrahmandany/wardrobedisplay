<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brand_data = Brand::latest()->where('trash', 0)->get();
        return view('Admin.Brand.index',[
            'brand_data' => $brand_data,
            'form_type' => 'create'
        ]);
    }

    public function store(Request $request)
    {
        //multiple image upload
        $paperImg = [];

        if( $request -> hasFile('gallery')){
            $gallery = $request -> file('gallery');
                foreach ($gallery as $key) {
                    $file_name = md5(time().rand()) . '.'. $key -> clientExtension();
                    $key -> move(public_path('Photos/Brand_logo/'), $file_name);
                    array_push($paperImg , $file_name);
                }
        }

        Brand::create([
            'brand_name'=>$request->brand_name,
            'image'=> json_encode($paperImg),
        ]);

        return back()->with('sucess','Your Brand Data Insert Succefully');
    }

    public function edit(string $id)
    {
        $brand_data = Brand::findOrFail($id);
        return view('Admin.Brand.index',[
            'brand_data' => $brand_data,
            'form_type' => 'edit'
        ]);

    }

    public function trash(string $id)
    {
        $data =  Brand::findorFail($id);

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
