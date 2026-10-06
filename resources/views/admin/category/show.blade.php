@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Show Categoria | {{ $category->name }}
                <a href="{{ url('admin/categories') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <h4>Nombre Categoria: {{ $category->name }}</h4>
            <h4>Estado: {{ $category->status == 1 ? 'Activo' : 'Inactivo' }}</h4>
            <h4>Popular: {{ $category->popular == 1 ? 'Si' : 'No' }}</h4>
            <h4>Imagen:</h4>
            @if ($category->image)
                <img src="{{ asset($category->image) }}" style="width: 100px; height: 100px;" alt="Imagen Categoria Muestra" />
            @else
                <p>No hay imagen disponible</p>
            @endif
            <h4>Descripción: {{ $category->description }}</h4>
            

        </div>

    </div>
@endsection
