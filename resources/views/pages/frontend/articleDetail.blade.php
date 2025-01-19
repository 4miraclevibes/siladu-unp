@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('article') }}" class="text-decoration-none">
                            <i class='bx bx-arrow-back me-1'></i>
                            Kembali ke Artikel
                        </a>
                        <div class="text-muted">
                            <small>
                                <i class='bx bx-calendar me-1'></i>
                                {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                            </small>
                            <small class="ms-3">
                                <i class='bx bx-user me-1'></i>
                                {{ $article->user->name }}
                            </small>
                        </div>
                    </div>
                    
                    <h2 class="mb-4">{{ $article->title }}</h2>

                    <div class="article-content">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection