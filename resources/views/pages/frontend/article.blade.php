@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center mb-4">Our Team</h2>
            <div class="d-flex justify-content-end">
                <div class="col-md-4">
                    <form action="{{ route('article') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari our team..." name="search">
                            <button class="btn btn-dark" type="button">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles List -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($articles as $article)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">
                            <i class='bx bx-calendar me-1'></i>
                            {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                        </small>
                        <small class="text-muted">
                            <i class='bx bx-user me-1'></i>
                            {{ $article->user->name }}
                        </small>
                    </div>
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{!! Str::limit(strip_tags($article->content), 150) !!}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-outline-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $articles->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
