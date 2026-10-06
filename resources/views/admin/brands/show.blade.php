@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Show Marca | {{ $brands->name }}
                <a href="{{ url('admin/brands') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <h4>Nombre Marca: {{ $brands->name }}</h4>
            <h4>Is Active: {{ $brands->status == 1 ? 'Yes' : 'No' }}</h4>
            <h4>Imagen:</h4>
            @if ($brands->image)
                <img src="{{ asset($brands->image) }}" style="width: 100px; height: 100px;" alt="Imagen Categoria Muestra" />
            @else
                <p>No hay imagen disponible</p>
            @endif
            
            

        </div>

    </div>
@endsection
