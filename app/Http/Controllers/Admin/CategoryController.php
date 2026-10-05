<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view ('admin.category.index', compact('categories'));
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

        if($request->hasFile('image')){

        $file = $request->file('image');
        $imgExt = $file->getClientOriginalExtension();

        $filename = time().'.'.$imgExt;
        $path = 'uploads/category/';
        $file->move($path, $filename);

        $data['image'] = $filename;
        }

        Category::create($data);

        return redirect('/admin/categories')->with('status', 'Categoria creado correctamente.');
    }
}
