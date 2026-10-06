<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandFormRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\File;


class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(BrandFormRequest $request)
    {
        // You can now use $data to create a new brand, for example:
        // Brand::create($data);
        $data = $request->validated();
        //Condition to image
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            $path = 'uploads/brands/';
            $file->move($path, $filename);

            // Move the uploaded file to the designated path and set the image path in the data array
            $data['image'] = $path . $filename;
        }

        Brand::create($data);

        return redirect('/admin/brands')->with('status', 'Marca creada correctamente.');
    }
//  Show the form for editing the specified brand.
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }
    
//  Update the specified category in storage.
    public function update(BrandFormRequest $request, Brand $brand)
    {
        // You can now use $data to update the brand, for example:
        // Brand::create($data);
        $data = $request->validated();

        //Condition to image
        if ($request->hasFile('image')) {
                // Delete the old image if it exists
            if (File::exists($brand->image)) {
                File::delete($brand->image);
            }
            // Handle the new image upload
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            // Generate a unique filename for the new image
            $filename = time() . '.' . $imgExt;
            $path = 'uploads/brands/';
            $file->move($path, $filename);

            // Move the uploaded file to the designated path and set the image path in the data array
            $data['image'] = $path . $filename;
        }
        // Update the brand with the new data
        $brand->update($data);

        // Redirect back to the brands list with a success message
        return redirect('/admin/brands')->with('status', 'Marca actualizada correctamente.');
    }
    
     public function show($id)
    {
        $brands = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brands'));
    }

    public function destroy($id){
        $brand = Brand::findOrFail($id);

        // Delete the brand's image if it exists
        if (File::exists($brand->image)) {
            File::delete($brand->image);
        }

        $brand->delete();
        return redirect('/admin/brands')->with('status', 'Marca eliminada correctamente.');
    }
}
