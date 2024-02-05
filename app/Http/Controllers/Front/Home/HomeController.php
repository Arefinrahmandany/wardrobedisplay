<?php

namespace App\Http\Controllers\Front\Home;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MainSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Show Methode for front home page
     */
    public function index()
    {
        $mainSlide = MainSlide::latest()->get();
        $brand = Brand::latest()->get();
        $product = Product::latest()->get();
        return view('Front.index',[
            'mainSlide' => $mainSlide,
            'product' => $product,
            'brand' => $brand
        ]);
    }

    /**
     * Show Methods for front products page
     */
    public function products(Request $request)
    {
        $brand = Brand::latest()->where('trash', 0)->where('status', 1)->get();

        // Calculate the total number of products for each brand
        $totalProductsInBrand = [];

            foreach ($brand as $brandItem) {
                $totalProductsInBrand[$brandItem->brand_name] = Product::where('product_brand', $brandItem->brand_name)->count();
            }

        // Get sorting criteria from the request or use a default value
        $sortBy = $request->input('sort_by', 'newest');

        // Get search query from the request
        $searchQuery = $request->input('search', '');

        // Get category filter from the request
        $categoryFilter = $request->input('category');

            // Check if the "Clear All" button is clicked
            if ($request->has('clear_all')) {
                // Redirect to the same route without any query parameters
                return redirect()->route('home.all-products');
            }

        // Fetch distinct categories and their counts
        $categories = Product::distinct('product_category')->pluck('product_category')->toArray();

        $categoryCounts = Product::select(DB::raw('product_category, COUNT(*) as count'))
            ->groupBy('product_category')
            ->pluck('count', 'product_category')
            ->toArray();

        // Query to get all products with the selected sorting criteria, search query, and category filter
        $all_products = $this->getFilteredProducts($sortBy, $searchQuery, $categoryFilter);

        return view('Front.product-list', [
            'all_products' => $all_products,
            'brand_data' => $brand,
            'total_products_in_brand' => $totalProductsInBrand,
            'sortBy' => $sortBy, // Pass the current sorting criteria to the view
            'searchQuery' => $searchQuery, // Pass the current search query to the view
            'categories' => $categories,
            'categoryCounts' =>$categoryCounts,
        ]);
    }


    private function getFilteredProducts($sortBy, $searchQuery, $categoryFilter)
    {
        // Replace this with your actual product retrieval logic
        $query = Product::query();

        // Apply category filter if provided
        if ($categoryFilter) {
            $query->where('product_category', $categoryFilter);
        }

        // Apply search query if provided
        if ($searchQuery) {
            $query->where('product_name', 'like', "%$searchQuery%");
        }

        // Apply sorting criteria
        switch ($sortBy) {
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            // Add more sorting options if needed
            // ...
            default:
                $query->latest();
        }

        // Get the final result
        return $query->get();
    }



    private function getSortedProducts($sortBy)
    {
        // Implement your logic for fetching and sorting products
        // Example: Get products from the database and sort them based on the selected criteria

        // Replace this with your actual product retrieval logic
        $query = Product::query();

        if ($sortBy === 'popular') {
            // Implement sorting by popularity logic
            // Example: $query->orderByDesc('popularity');
        } else {
            // Default sorting by newest
            $query->latest();
        }

        return $query->get();
        }
    /**
     * Show Methods for single product page
     */
    public function show($id)
    {
        $brand = Brand::latest()->where('trash', 0)->where('status', 1)->get();

        // Calculate the total number of products for each brand
        $totalProductsInBrand = [];
        foreach ($brand as $brandItem) {
            $totalProductsInBrand[$brandItem->brand_name] = Product::where('product_brand', $brandItem->brand_name)->count();
        }
        $category = Category::findOrFail($id);
        $product = Product::findOrFail($id);
        $all_products = Product::latest()->take(5)->get();
        return view('Front.product_detail',[
            'product' => $product,
            'brand_data' => $brand,
            'category_data' => $category,
            'all_products' => $all_products,
            'total_products_in_brand' => $totalProductsInBrand
        ]);
    }

}
