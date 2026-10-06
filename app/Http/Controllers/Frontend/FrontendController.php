<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class FrontendController extends Controller
{
    public function index() {

        //Busca todas las imágenes para el carrusel
        $imagesProducts = Product::latest()->limit(6)->get();
        $categories = Category::all();
        $imagesBrands = Brand::all();
        return view('frontend.index', compact('imagesProducts', 'categories', 'imagesBrands'));
    }


}
