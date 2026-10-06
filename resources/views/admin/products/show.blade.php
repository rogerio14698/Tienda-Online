@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Show Producto Detalle | {{ $products->name }}
                <a href="{{ url('admin/products') }}" class="btn btn-danger float-end">Back</a>
            </h4>
            <p>Detalles del producto</p>
        </div>
        <div class="card-body">
            <h4>Nombre Producto: {{ $products->name }}</h4>
            <h4>Estado: {{ $products->is_active == 1 ? 'Activo' : 'Inactivo' }}</h4>
            <h4>Popular: {{ $products->is_trending == 1 ? 'Si' : 'No' }}</h4>
            <h4>Imagen:</h4>
            @if ($products->image)
                <img src="{{ asset($products->image) }}" style="width: 100px; height: 100px;" alt="Imagen Producto Muestra" />
            @else
                <p>No hay imagen disponible</p>
            @endif
            <h4>Descripción: {{ $products->description }}</h4>
            <h4>Descripción Pequeña: {{ $products->small_description }}</h4>

        </div>

    </div>
@endsection
