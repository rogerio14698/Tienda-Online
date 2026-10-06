<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        // You can now use $data to create a new category, for example:
        // Category::create($data);
        $data = $request->validated();

        //Condition to image

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            $path = 'uploads/category/';
            $file->move($path, $filename);

            // Move the uploaded file to the designated path and set the image path in the data array
            $data['image'] = $path . $filename;
        }

        Category::create($data);

        return redirect('/admin/categories')->with('status', 'Categoria creado correctamente.');
    }
//  Show the form for editing the specified category.
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    
//  Update the specified category in storage.
    public function update(CategoryRequest $request, Category $category)
    {
        // You can now use $data to create a new category, for example:
        // Category::create($data);
        $data = $request->validated();

        //Condition to image
        if ($request->hasFile('image')) {
                // Delete the old image if it exists
            if (File::exists($category->image)) {
                File::delete($category->image);
            }
            // Handle the new image upload
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            
            // Generate a unique filename for the new image
            $filename = time() . '.' . $imgExt;
            $path = 'uploads/category/';
            $file->move($path, $filename);

            // Move the uploaded file to the designated path and set the image path in the data array
            $data['image'] = $path . $filename;
        }
        // Update the category with the new data
        $category->update($data);

        // Redirect back to the categories list with a success message
        return redirect('/admin/categories/'.$category->id)->with('status', 'Categoria actualizado correctamente.');
    }
    
     public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }
    public function destroy($id){
        $category = Category::findOrFail($id);

        // Delete the category's image if it exists
        if (File::exists($category->image)) {
            File::delete($category->image);
        }

        $category->delete();
        return redirect('/admin/categories')->with('status', 'Categoria eliminada correctamente.');
    }
}
