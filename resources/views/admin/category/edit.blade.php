@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Editar Categoria | {{ $category->name }}
                <a href="{{ url('admin/categories') }}" class="btn btn-danger float-end">Back</a>
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

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Category Name -->
                    <div class="col-md-12">
                        <label for="">Nombre Categoria</label>
                        <input value="{{ $category->name }}" type="text" name="name" class="form-control" />
                    </div>
                    <!-- Category Description -->
                    <div class="col-md-12">
                        <label for="">Descripcion Categoria</label>
                        <input value="{{ $category->description }}" type="text" name="description" class="form-control" />
                    </div>

                    <!-- Category Status and Popular -->
                    <div class="row mb-3">
                        <label for="">Status Categoria</label>
                        <select name="status" id="" class="form-select">
                            <option value="">--Select Status--</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Mostrar</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Ocultar</option>
                        </select>
                    <!-- Popular Checkbox -->
                        <div class="col-md-12">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular" {{ $category->popular == 1 ? 'checked' : '' }} /> Marcar si es popular
                        </div>
                    </div>
                    <!-- Category Image -->
                    <div class="col-md-12">
                        <label for="" class="">Subir Imagen</label>
                        <input type="file" name="image" class="form-control" />
                        @if($category->image)
                            <img src="{{ asset( "$category->image") }}" style="width: 100px; height: 100px;" alt="Imagen Categoria Muestra" />
                        @else
                            <p>No hay imagen disponible</p>
                        @endif

                    </div>
                    <!-- SEO Details -->
                    <div class="col-md-12 mt-4">
                        <h4>SEO Details</h4>
                    </div>
                    <!-- Meta Title -->
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <textarea type="text" name="meta_title" class="form-control"> 
                            {!! $category->meta_title !!}
                        </textarea>
                    </div>
                    <!-- Meta Description -->
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" > 
                            {!! $category->meta_description !!}
                        </textarea>
                    </div>
                    <!-- Meta Keywords -->
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keywords" class="form-control" > 
                            {!! $category->meta_keywords !!}
                        </textarea>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>

        </div>

    </div>
@endsection
