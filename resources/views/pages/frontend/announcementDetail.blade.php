@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('announcement') }}" class="text-decoration-none">
                            <i class='bx bx-arrow-back me-1'></i>
                            Kembali ke Pengumuman
                        </a>
                        <div class="text-muted">
                            <small>
                                <i class='bx bx-calendar me-1'></i>
                                {{ \Carbon\Carbon::parse($announcement->created_at)->format('d M Y') }}
                            </small>
                            <small class="ms-3">
                                <i class='bx bx-user me-1'></i>
                                {{ $announcement->user->name }}
                            </small>
                        </div>
                    </div>
                    
                    <h3 class="mb-4">{{ $announcement->title }}</h3>
                    <div class="announcement-content">
                        {!! $announcement->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
