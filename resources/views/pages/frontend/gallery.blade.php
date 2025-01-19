@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center mb-4">Galeri Kegiatan</h2>
            <div class="d-flex justify-content-end">
                <div class="col-md-4">
                    <form action="{{ route('gallery') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari galeri..." name="search">
                            <button class="btn btn-dark" type="button">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Galleries -->
    @foreach($galleries as $gallery)
    <div class="card mb-5">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">{{ $gallery->title }}</h4>
                <small class="text-muted">
                    <i class='bx bx-calendar me-1'></i>
                    {{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}
                </small>
            </div>
            <p class="text-muted mb-4">{!! $gallery->content !!}</p>

            <div class="row g-3 gallery-container">
                @foreach($gallery->galleryDetails as $index => $detail)
                <div class="col-md-3">
                    <a href="{{ Storage::url($detail->image) }}" class="gallery-item" data-gallery="gallery-{{ $gallery->id }}">
                        <img src="{{ Storage::url($detail->image) }}" 
                             class="img-fluid rounded w-100" 
                             alt="Gallery Image"
                             style="height: 200px; object-fit: cover;">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $galleries->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Lightbox Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close position-absolute top-0 end-0 p-3" data-bs-dismiss="modal"></button>
                <img src="" class="img-fluid" id="galleryModalImage">
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.gallery-item {
    display: block;
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: scale(1.02);
}

.gallery-item img {
    transition: all 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gallery lightbox functionality
    const galleryItems = document.querySelectorAll('.gallery-item');
    const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
    const modalImage = document.getElementById('galleryModalImage');

    galleryItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            modalImage.src = this.href;
            modal.show();
        });
    });
});
</script>
@endpush
