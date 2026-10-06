@extends('layouts.admin')
@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h4 class="mb-0">Productos
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end">Agregar Producto</a>
            </h4>
        </div>

        <div class="card-body">
            @session('status')
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endsession

            {{-- Tabla donde muestro todos los productos --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Estado</th>
                        <th>Pupular</th>
                        <th>Imagen</th>
                        <th>Descripcion Pequeña</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td class="align-middle fw-bold">{{ $item->id }}</td>
                            <td>
                                <!-- Contenedor Flex en columna -->
                                <div class="d-flex flex-column gap-1">
                                    <div><strong>Nombre:</strong> {{ $item->name }}</div>
                                    <div><strong>Marca:</strong> {{ $item->brand->name ?? 'Sin Asignar' }}</div>
                                    <div><strong>Categoría:</strong> {{ $item->category->name ?? 'Sin Asignar' }}</div>
                                    <div><strong>Precio Original:</strong> {{ number_format($item->original_price, 2) }} €
                                    </div>
                                    <div><strong>Precio Venta:</strong> {{ number_format($item->selling_price, 2) }} €</div>
                                    <div><strong>Unidades:</strong> {{ $item->quantity }}</div>
                                </div>
                            </td>
                            <td>{{ $item->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{ $item->is_trending == 1 ? 'Si' : 'No' }}</td>
                            <td class="d-flex flex-column align-items-center m1">
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" style="width: 100px; height: 100px;"
                                        alt="Imagen Categoria Muestra" />
                                @else
                                    <p>No hay imagen disponible</p>
                                @endif
                            </td>
                            <td>{{ $item->small_description }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ route('products.show', $item->id) }}"
                                    class="btn btn-primary btn-sm">Mostrar</a>
                                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('products.delete', $item->id) }}"
                                    class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
