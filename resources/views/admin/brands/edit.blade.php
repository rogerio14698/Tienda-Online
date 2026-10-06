@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Editar Marca | {{ $brand->name }}
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

            <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Category Name -->
                    <div class="col-md-12">
                        <label for="">Nombre Marca</label>
                        <input value="{{ $brand->name }}" type="text" name="name" class="form-control" />
                    </div>
                        <!-- Is Active section -->
                    <div class="col-md-12 mt-3 mb-3">
                        <label for="">Estado Activo</label>
                        <input type="checkbox" name="is_active" class="form-check-input" style="width: 25px; height: 25px;" {{ $brand->is_active ? 'checked' : '' }} />
                    </div>
                    <!-- Category Image -->
                    <div class="col-md-12">
                        <label for="imageBrand">Subir Imagen</label>
                        <input type="file" name="image" id="imageBrand" class="form-control" />
                        @if($brand->image)
                            <img src="{{ asset( "$brand->image") }}" style="width: 100px; height: 100px;" alt="Imagen Marca Muestra" />
                        @else
                            <p class="text-muted mt-3" notes="No hay imagen disponible" style="font-style: italic; user-select: none;">No hay imagen disponible</p>
                        @endif

                    </div>
                    <!-- End of Category Image -->

                    <!-- Is active Start -->


                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>

        </div>

    </div>
@endsection
