@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0 ">Brands
                <a href="{{ url('admin/brands/create') }}" class="btn btn-primary float-end">Agregar Marcas</a>
            </h4>
        </div>
        <div class="card-body">
            @session('status')
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endsession

            {{-- Tabla donde muestro todas las categorias --}}
            <table class="table table-bordered bg-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Marca</th>
                        <th>Is Active</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $item)
                        <tr class="align-middle">
                            <td class="align-middle justify-content-center"><strong>{{ $item->id }}</strong></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td class="justify-content-center" >
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" style="width: 80px; height: 80px;"
                                        alt="Imagen Marca Muestra" />
                                @else
                                    <p>No hay imagen disponible</p>
                                @endif
                            </td>
                            <td class="m-3 g-1">
                                <a href="{{ route('brands.show', $item->id) }}" class="btn btn-primary btn-sm">Mostrar</a>
                                <a href="{{ route('brands.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('brands.destroy', $item->id) }}" class="btn btn-danger btn-sm"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">Eliminar</a>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('brands.destroy', $item->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
