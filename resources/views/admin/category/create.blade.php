@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Add Category
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

            <form action="{{ url('admin/categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Nombre Categoria</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <label for="">Descripcion Categoria</label>
                        <input type="text" name="description" class="form-control" />
                    </div>
                    <div class="row mb-3">
                        <label for="">Status Categoria</label>
                        <select name="status" id="" class="form-select">
                            <option value="">--Select Status--</option>
                            <option value="0">Mostrar</option>
                            <option value="1">Ocultar</option>
                        </select>
                        <div class="col-md-12">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular"  /> Marcar si es popular
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label for="imageCategory" >Subir Imagen</label>
                        <input type="file" name="image" id="imageCategory" class="form-control" />
                    </div>
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
                        <textarea type="text" name="meta_description" class="form-control" > 
                        </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keywords" class="form-control" > 
                        </textarea>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>

        </div>

    </div>
@endsection
