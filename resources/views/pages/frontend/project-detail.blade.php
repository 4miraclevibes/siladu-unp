@extends('layouts.frontend.main')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}" class="text-decoration-none">
                            <i class='bx bx-home-alt'></i> Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pengujian</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="card-title mb-4 fw-bold">{{ $project->name }}</h1>
                    <div class="position-relative mb-4">
                        <img src="{{ Storage::url($project->image) }}" 
                             class="img-fluid rounded w-100" 
                             alt="{{ $project->name }}"
                             style="max-height: 500px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3" 
                             style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                            <div class="d-flex text-white">
                                <div class="me-4">
                                    <i class='bx bx-calendar'></i>
                                    {{ $project->created_at->format('d F Y') }}
                                </div>
                                <div>
                                    <i class='bx bx-time'></i>
                                    {{ $project->created_at->format('H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                        <h4 class="mb-3 fw-bold">
                            <i class='bx bx-info-circle'></i> Deskripsi Pengujian
                        </h4>
                        <p class="text-justify" style="line-height: 1.8; text-align: justify;">
                            {{ $project->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3 fw-bold">
                        <i class='bx bx-detail'></i> Informasi Pengujian
                    </h5>
                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <span class="text-muted">
                            <i class='bx bx-calendar-plus'></i> Dibuat pada
                        </span>
                        <span class="fw-semibold">{{ $project->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">
                            <i class='bx bx-calendar-edit'></i> Diperbarui pada
                        </span>
                        <span class="fw-semibold">{{ $project->updated_at->format('d F Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-bold">
                        <i class='bx bx-list-ul'></i> Pengujian Lainnya
                    </h5>
                    @foreach($relatedProjects as $relatedProject)
                        <div class="d-flex align-items-center mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                            <img src="{{ Storage::url($relatedProject->image) }}" 
                                 class="rounded me-3" 
                                 alt="Related Project"
                                 style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h6 class="mb-2">
                                    <a href="{{ route('project.detail', $relatedProject) }}" 
                                       class="text-decoration-none text-dark fw-semibold">
                                        {{ $relatedProject->name }}
                                    </a>
                                </h6>
                                <small class="text-muted d-block mb-2">
                                    {{ Str::limit($relatedProject->description, 50) }}
                                </small>
                                <small class="text-primary">
                                    <i class='bx bx-calendar-alt'></i>
                                    {{ $relatedProject->created_at->format('d F Y') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .breadcrumb-item a {
        color: #696cff;
    }
    .breadcrumb-item a:hover {
        color: #5f61e6;
    }
    .project-description p {
        color: #566a7f;
    }
</style>
@endpush
