<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Requests\Product\UpdateProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    public function store(CreateProductFormRequest $request)
    {
        // You can now use $data to create a new category, for example:
        // Category::create($data);
        $data = $request->validated();

        //Condition to image

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            // Get the original extension of the uploaded image
            $filename = time() . '.' . $imgExt;
            $path = 'uploads/products/';
            $file->move($path, $filename);

            // Move the uploaded file to the designated path and set the image path in the data array
            $data['image'] = $path . $filename;
        }

        Product::create($data);
        return redirect('/admin/products')->with('status', 'Producto creado correctamente.');
    }
//  Show the form for editing the specified category.
    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::findOrFail($id);
        return view('admin.products.edit', compact('products', 'brands', 'categories'));
    }
    
//  Update the specified category in storage.
    public function update(UpdateProductFormRequest $request, Product $product)
    {
        // You can now use $data to create a new category, for example:
        // Category::create($data);
        $data = $request->validated();

        //Condition to image
        if ($request->hasFile('image')) {
                // Delete the old image if it exists
            if (File::exists($product->image)) {
                File::delete($product->image);
            }
            // Handle the new image upload
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            
            // Generate a unique filename for the new image
            $filename = time() . '.' . $imgExt;
            $path = 'uploads/products/';
            $file->move($path, $filename);

            // Move the uploaded file to the designated path and set the image path in the data array
            $data['image'] = $path . $filename;
        }
        // Update the category with the new data
        $product->update($data);

        // Redirect back to the products list with a success message
        return redirect('/admin/products/'.$product->id)->with('status', 'Producto actualizado correctamente.');
    }
    
     public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.products.show', compact('products'));
    }
    public function destroy($id){
        $product = Product::findOrFail($id);

        // Delete the product's image if it exists
        if (File::exists($product->image)) {
            File::delete($product->image);
        }

        $product->delete();
        return redirect('/admin/products')->with('status', 'Producto eliminado correctamente.');
    }
}
