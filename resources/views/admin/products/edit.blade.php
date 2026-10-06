@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Editar Producto | {{ $products->name }}
                <a href="{{ url('admin/products') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <!--Seccion card de error -->
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
            <!--Fin de seccion de errores    -->
            <form action="{{ url('admin/products/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Product Name -->
                    <div class="col-md-12">
                        <label for="">Nombre Producto</label>
                        <input type="text" name="name" class="form-control" value="{{ $products->name }}" />
                    </div>
                    <!-- Small Description -->
                    <div class="col-md-12">
                        <label for="">Descripcion Producto Pequeña</label>
                        <textarea name="small_description" class="form-control">{{ $products->small_description }}</textarea>
                    </div>
                    <!-- Long Description -->
                    <div class="col-md-12">
                        <label for="">Descripcion Producto Larga</label>
                        <textarea name="description" class="form-control">{{ $products->description }}</textarea>
                    </div>
                    <!-- End Long Description -->
                    <!-- Product Price Section -->
                    <div class="col-md-6">
                        <label for="">Precio Original</label>
                        <input type="text" name="original_price" class="form-control"
                            value="{{ $products->original_price }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Precio de Venta</label>
                        <input type="text" name="selling_price" class="form-control"
                            value="{{ $products->selling_price }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Cantidad</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $products->quantity }}" />
                    </div>
                    <!-- End Product Price Section -->

                    <!--List Marca -->
                    <div class="col-md-6">
                        <label for="">Marca</label>
                        <select name="brand_id" id="" class="form-select">
                            <option value="">--Select Marca--</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ $products->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
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
                                <option value="{{ $category->id }}"
                                    {{ $products->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!--End List Categoria -->


                    <!--CheckBox Section -->
                    <div class="col mb-3">
                        <label for="">Status Producto</label>
                        <select name="status" id="" class="form-select">
                            <option value="">--Select Status--</option>
                            <option value="0" {{ $products->status == 0 ? 'selected' : '' }}>Mostrar</option>
                            <option value="1" {{ $products->status == 1 ? 'selected' : '' }}>Ocultar</option>
                        </select>
                        <div class="col-md-12">
                            <label for="">Tendencia</label>
                            <input type="checkbox" name="is_trending" {{ $products->is_trending == 1 ? 'checked' : '' }} /> Marcar si es tendencia
                        </div>
                    </div>

                    <!-- Product Image | Actualizar esto y permitir que se pueda subir más de una imagen de un mismo producto. -->
                    <!-- Product Image -->
                    <div class="col-md-12">
                        <label for="imageBrand">Subir Imagen</label>
                        <input type="file" name="image" id="imageBrand" class="form-control" />
                        @if($products->image)
                            <img src="{{ asset( "$products->image") }}" style="width: 100px; height: 100px;" alt="Imagen Producto Muestra" />
                        @else
                            <p class="text-muted mt-3" notes="No hay imagen disponible" style="font-style: italic; user-select: none;">No hay imagen disponible</p>
                        @endif
                    </div>

                    <!-- Seo Details -->
                    <div class="col-md-12 mt-4">
                        <h4>SEO Details</h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <textarea type="text" name="meta_title" class="form-control">
                            {{ $products->meta_title ?? '' }}
                        </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control"> 
                            {{ $products->meta_description ?? '' }}
                        </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keywords" class="form-control"> 
                            {{ $products->meta_keywords ?? '' }}
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
