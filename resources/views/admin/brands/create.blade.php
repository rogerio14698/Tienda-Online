@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Crear Marca
                <a href="{{ url('admin/brands') }}" class="btn btn-danger float-end">Back</a>
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
            <form action="{{ url('admin/brands') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Name section -->

                    <div class="col-md-12">
                        <label for="">Nombre Marca</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <!-- Description section -->
                    <div class="col-md-12">
                        <label for="">Descripcion Marca</label>
                        <input type="text" name="description" class="form-control" />
                    </div>
                    <!-- Is Active section -->
                    <div class="col-md-12 mt-3 mb-3">
                        <label for="">Estado Activo</label>
                        <input type="checkbox" name="is_active" class="form-check-input" style="width: 25px; height: 25px;" checked />
                    </div>
                    <!-- Image upload section -->
                    <div class="col-md-12">
                        <label for="imageBrand" >Subir Imagen</label>
                        <input type="file" name="image" id="imageBrand" class="form-control" />
                    </div>
                    <div class="col-md-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>

        </div>

    </div>
@endsection
