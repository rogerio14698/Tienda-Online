@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Add Producto
                <a href="{{ url('admin/products') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Product Name -->
                    <div class="col-md-12">
                        <label for="">Nombre Producto</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <!-- Small Description -->
                    <div class="col-md-12">
                        <label for="">Descripcion Producto Pequeña</label>
                        <textarea name="small_description" class="form-control"></textarea>
                    </div>
                    <!-- Long Description -->
                     <div class="col-md-12">
                        <label for="">Descripcion Producto Larga</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <!-- End Long Description -->
                    <!-- Product Price Section -->
                    <div class="col-md-6">
                        <label for="">Precio Original</label>
                        <input type="number" min="0" name="original_price" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Precio de Venta</label>
                        <input type="number" min="0" name="selling_price" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Cantidad</label>
                        <input type="number" min="0" name="quantity" class="form-control" />
                    </div>
                    <!-- End Product Price Section -->

                    <!--List Marca -->
                    <div class="col-md-6">
                        <label for="">Marca</label>
                        <select name="brand_id" id="" class="form-select">
                            <option value="">--Select Marca--</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--End List Marca -->
                    <!--List Categoria -->
                    <div class="col-md-6">
                        <label for="">Categoria</label>
                        <select name="category_id" id="" class="form-select">
                            <option value="">--Select Categoria--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--End List Categoria -->


                    <!--CheckBox Section -->
                    <div class="col mb-3">
                        <label for="">Status Producto</label>
                        <select name="status" id="" class="form-select">
                            <option value="">--Select Status--</option>
                            <option value="0">Mostrar</option>
                            <option value="1">Ocultar</option>
                        </select>
                        <div class="col-md-12">
                            <label for="">Tendencia</label>
                            <input type="checkbox" name="is_trending" /> Marcar si es tendencia
                        </div>
                    </div>

                    <!-- Product Image | Actualizar esto y permitir que se pueda subir más de una imagen de un mismo producto. -->
                    <div class="col-md-12">
                        <label for="imageCategory">Subir Imagen Producto</label>
                        <input type="file" name="image" id="imageCategory" class="form-control" />
                    </div>

                    <!-- Seo Details -->
                    <div class="col-md-12 mt-4">
                        <h4>SEO Details</h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <textarea type="text" name="meta_title" class="form-control"> 
                        </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control"> 
                        </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keywords" class="form-control"> 
                        </textarea>
                    </div>
                    <!-- SEO Details End -->
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>

        </div>

    </div>
@endsection
