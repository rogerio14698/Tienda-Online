<header class="py-5">
    <div class="container">
    <div id="carouselLadingPageHeader" class="carousel slide mx-auto">
        <div class="carousel-indicators">
            @foreach ($imagesProducts as $product)
                <button type="button" data-bs-target="#carouselLadingPageHeader"
                    data-bs-slide-to="{{ $loop->index }}"
                    @class(['active' => $loop->first])
                    @if ($loop->first) aria-current="true" @endif
                    aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @forelse ($imagesProducts as $product)
                <div @class(['carousel-item', 'active' => $loop->first])>
                    <img src="{{ asset($product->image) }}" class="d-block mx-auto img-fluid"
                        style="max-height: 400px; object-fit: contain;" alt="{{ $product->name }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white bg-dark bg-opacity-50 w-auto">{{ $product->name }}</h5>
                        <p class="text-white bg-dark bg-opacity-50 w-auto">{{ $product->small_description }}</p>
                        <button class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            @empty
                <div class="carousel-item active">
                    <div class="d-block w-100 bg-secondary" style="height: 400px;"></div>
                </div>
            @endforelse
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselLadingPageHeader" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselLadingPageHeader" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
</header>