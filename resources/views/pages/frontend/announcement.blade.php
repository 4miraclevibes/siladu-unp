@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center mb-4">Pengumuman</h2>
            <div class="d-flex justify-content-end">
                <div class="col-md-4">
                    <form action="{{ route('announcement') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari pengumuman..." name="search">
                        <button class="btn btn-dark" type="button">
                            <i class='bx bx-search'></i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcements List -->
    <div class="row">
        @foreach($announcements as $announcement)
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                @if($announcement->thumbnail)
                    <img src="{{ Storage::url($announcement->thumbnail) }}" class="card-img-top" alt="{{ $announcement->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">
                            <i class='bx bx-calendar me-1'></i>
                            {{ \Carbon\Carbon::parse($announcement->created_at)->format('d M Y') }}
                        </small>
                        <small class="text-muted">
                            <i class='bx bx-user me-1'></i>
                            {{ $announcement->user->name }}
                        </small>
                    </div>
                    <h5 class="card-title">{{ $announcement->title }}</h5>
                    <p class="card-text">{!! Str::limit(strip_tags($announcement->content), 150) !!}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('announcement.show', $announcement->id) }}" class="btn btn-sm btn-outline-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Showing {{ $announcements->firstItem() }} to {{ $announcements->lastItem() }} of {{ $announcements->total() }} results
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        @if ($announcements->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">« Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $announcements->previousPageUrl() }}" rel="prev">« Previous</a>
                            </li>
                        @endif

                        @foreach ($announcements->getUrlRange(1, $announcements->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $announcements->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($announcements->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $announcements->nextPageUrl() }}" rel="next">Next »</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next »</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
