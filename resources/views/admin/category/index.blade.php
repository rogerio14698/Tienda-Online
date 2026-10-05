@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="mb-0">Categorías
                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary float-end">Agregar Categoría</a>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Categoria</th>
                        <th>Estado</th>
                        <th>Pupular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{ $item->popular == 1 ? 'Si' : 'No' }}</td>
                            <td>
                                <a href="{{ route('categories.show', $item->id) }}" class="btn btn-primary btn-sm">Mostrar</a>
                                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
