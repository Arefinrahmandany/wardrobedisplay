<?php

namespace App\Http\Controllers\Admin\MainSlide;

use App\Models\MainSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainSlideController extends Controller
{
    public function index()
    {
        $mainSlide = MainSlide::latest()->get();
        return view('Admin.page_style.mainSlide',[
            'mainSlide' => $mainSlide
        ]);
    }

    public function store(Request $request)
    {
        //multiple image upload

        $slideImage = [];

        if( $request -> hasFile('slide_image')){
            $slide_image = $request -> file('slide_image');
                foreach ($slide_image as $key) {
                $file_name = md5(time().rand()) . '.'. $key -> clientExtension();
                $key -> move(public_path('Photos/Slides/MainSlide/'), $file_name);
                array_push($slideImage , $file_name);
                }
        }

        MainSlide::create([

            'slide_title'   => $request->slide_title,
            'display_link'  => $request-> display_link,
            'slide_image'   => json_encode( $slideImage ),

        ]);

                // Redirect or return a response
                return back()->with('success', 'Product added successfully');
    }


}
