@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center mb-4">Peralatan Laboratorium</h2>
            <div class="d-flex justify-content-end">
                <div class="col-md-4">
                    <form action="{{ route('tool') }}" method="GET">
                    <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari peralatan..." name="search">
                            <button class="btn btn-dark" type="button">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tools Grid -->
    <div class="row">
        @foreach($tools as $tool)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div id="carousel-{{$tool->id}}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($tool->toolImages as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ Storage::url($image->image) }}" class="d-block w-100" alt="Tool Image" style="height: 200px; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{$tool->id}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{$tool->id}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $tool->name }}</h5>
                    <p class="card-text">{{ $tool->description }}</p>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#toolModal-{{$tool->id}}">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tool Detail Modal -->
        <div class="modal fade" id="toolModal-{{$tool->id}}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Peralatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="modalCarousel-{{$tool->id}}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($tool->toolImages as $index => $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($image->image) }}" class="d-block w-100" alt="Tool Image">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#modalCarousel-{{$tool->id}}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#modalCarousel-{{$tool->id}}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ $tool->name }}</h4>
                                <p class="text-muted mb-2">ID: TOOL-{{ str_pad($tool->id, 3, '0', STR_PAD_LEFT) }}</p>
                                <p>{{ $tool->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $tools->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    const searchButton = document.querySelector('.btn-dark');
    searchButton.addEventListener('click', function() {
        // Add search logic here
    });
});
</script>
@endpush
