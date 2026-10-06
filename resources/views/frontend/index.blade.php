@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.headerLading')

    <!-- Categorías -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Explora nuestras categorías</h2>
                <p class="text-body-secondary mb-0">Encuentra lo que buscas de forma rápida y sencilla.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse ($categories as $item)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" class="card-img-top object-fit-cover"
                                    style="height: 200px;" alt="{{ $item->name }}">
                            @else
                                <div class="bg-body-tertiary d-flex align-items-center justify-content-center text-body-secondary"
                                    style="height: 200px;">
                                    <span class="fs-1 fw-bold">{{ Str::upper(Str::substr($item->name, 0, 1)) }}</span>
                                </div>
                            @endif

                            <div class="card-body p-4">
                                <h3 class="h5 fw-semibold mb-2" data-metaTitle="{{ $item->meta_title ?? '' }}"
                                    data-metaKeywords="{{ $item->meta_keywords ?? '' }}">{{ $item->name }}</h3>
                                <p class="card-text text-body-secondary mb-0"
                                    data-metaDescription="{{ $item->meta_description ?? '' }}">
                                    {{ Str::limit($item->description ?? '', 110) }}
                                </p>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-body-secondary mb-0">No hay categorías disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('frontend.partials.footer')
@endsection
