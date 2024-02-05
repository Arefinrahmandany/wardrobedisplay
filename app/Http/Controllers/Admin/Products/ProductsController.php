<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductsController extends Controller
{
    public function index()
    {
        $product_data = Product::latest()->where('Trash', 0 )->where('status' , 1 )->get();
        return view('Admin.Products.index',[
            'product_data' => $product_data
        ]);
    }

    public function create()
    {
        $material = Material::latest()->where('Trash', 0 )->where('status' , 1 )->get();
        $category = Category::latest()->where('Trash', 0 )->where('status' , 1 )->get();
        $brand = Brand::latest()->get();
        return view('Admin.Products.add_product',[
            'material_data' => $material,
            'category_data' => $category,
            'brand'         => $brand
        ]);
    }

    public function store(Request $request)
    {
        /*
        // Validate the request data
        $request->validate([
            'product_name'      => 'required|string|max:255',
            'product_category'  => 'required|string|max:255',
            'product_brand'     => 'required|string|max:255',
            'strap_material'    => 'required|string|max:255',
            'product_waterproof'=> 'required|string|max:255',
            'frame_colour'      => 'required|string|max:255',
            'dial_size'         => 'required|string|max:255',
            'watch_type'        => 'required|string|max:255',
            'movement'          => 'required|string|max:255',
            'resistance'        => 'required|string|max:255',
            'product_feature'   => 'required|string|max:255',
            'warranty_type'     => 'required|string|max:255',
            'warranty'          => 'required|string|max:255',
            'warranty_policy'   => 'required|string',
            // Add validation rules for other fields
            'variants.*.variant_price'          => 'required|numeric',
            'variants.*.variant_specialPrice'   => 'nullable|numeric',
            'variants.*.variant_quantity'       => 'required|integer',
            'variants.*.variant_sellerSKU'      => 'nullable|string|max:255',
            'variants.*.variant_colour'         => 'nullable|string|max:255',
            'variants.*.variant_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        */

        //multiple image upload

        $productImg = [];

        if( $request -> hasFile('product_images')){
            $product_images = $request -> file('product_images');
                foreach ($product_images as $key) {
                $file_name = md5(time().rand()) . '.'. $key -> clientExtension();
                $key -> move(public_path('Photos/Products/'), $file_name);
                array_push($productImg , $file_name);
                }
        }

        // Create a new product
        $product = new Product([
            'product_name'      => $request->input('product_name'),
            'product_category'  => $request->input('product_category'),
            'product_brand'     => $request->input('product_brand'),
            'material_name'     => $request->input('material_name'),
            'product_waterproof'=> $request->input('product_waterproof'),
            'product_model'     => $request->input('product_model'),
            'frame_colour'      => $request->input('frame_colour'),
            'dial_size'         => $request->input('dial_size'),
            'watch_type'        => $request->input('watch_type'),
            'movement'          => $request->input('movement'),
            'resistance'        => $request->input('resistance'),
            'product_feature'   => $request->input('product_feature'),
            'warranty_type'     => $request->input('warranty_type'),
            'warranty'          => $request->input('warranty'),
            'warranty_policy'   => $request->input('warranty_policy'),
            'highlight'         => $request->input('highlight'),
            'price'             => $request->input('price'),
            'discount_price'    => $request->input('discount_price'),
            'colour'            => $request->input('colour'),
            'sellerSKU'         => $request->input('sellerSKU'),
            'quantity'          => $request->input('quantity'),
            'description'       => $request->input('description'),
            'product_photo'     => json_encode( $productImg ),
        ]);

        $product->save();

        /*
        // Save variants
        $variants = $request->input('variants');

        $file_name = []; // Initialize $file_name outside the if block
        if ($variants) {

            foreach ($variants as $variantData) {

                	//Single Image Upload
                    if ( $request->hasFile($variantData['variant_image'])) {
                        $img = $request->file($variantData['variant_image']);
                        $manager = new ImageManager(new Driver());
                        $extension = $img->getClientOriginalExtension(); // Get the file extension
                        $file_name = md5(time() . rand()).'.'.$extension;
                        $image = $manager->read($img);

                        Image::make($img->getRealPath())->resize(600, 600)->save(public_path('Photos/Products/'. $file_name));
                    }

                $variant = new ProductVariant([
                    'variant_price'         => $variantData['variant_price'],
                    'variant_specialPrice'  => $variantData['variant_specialPrice'],
                    'variant_quantity'      => $variantData['variant_quantity'],
                    'variant_sellerSKU'     => $variantData['variant_sellerSKU'],
                    'variant_colour'        => $variantData['variant_colour'],
                    'variant_image'         => json_encode($file_name),
                ]);
                $product->variants()->save($variant);
            }
        }
        */


        // Redirect or return a response
        return redirect()->route('products.index')->with('success', 'Product added successfully');

    }



}
