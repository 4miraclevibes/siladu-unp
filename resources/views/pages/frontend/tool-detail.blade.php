@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <!-- Header -->
                <div class="col-12 mb-4">
                    <h2 class="mb-2">{{ $tool->name }}</h2>
                    <p class="text-muted">ID: TOOL-{{ str_pad($tool->id, 3, '0', STR_PAD_LEFT) }}</p>
                </div>

                <!-- Image Carousel -->
                <div class="col-md-8 mb-4">
                    <div class="swiper tool-swiper">
                        <div class="swiper-wrapper">
                            @foreach($tool->toolImages as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->image) }}" 
                                     alt="Tool Image" 
                                     class="img-fluid rounded">
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-12">
                    <div class="description-section">
                        <h5>Deskripsi:</h5>
                        <div class="description-content">
                            {!! $tool->description !!}
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('tool') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back'></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<style>
.tool-swiper {
    width: 100%;
    padding-bottom: 50px;
}
.tool-swiper .swiper-slide {
    text-align: center;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.tool-swiper img {
    width: auto;
    height: auto;
    max-width: none;
    max-height: none;
    border-radius: 8px;
}
.description-content {
    text-align: justify;
}
.description-section {
    padding: 20px;
    border-radius: 5px;
    margin-top: 20px;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.tool-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
</script>
@endpush
