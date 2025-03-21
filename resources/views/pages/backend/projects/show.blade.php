@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Proyek</h5>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12 text-center mb-3">
                    <img src="{{ asset('storage/' . $project->image) }}" 
                         alt="Project Image" 
                         class="img-fluid rounded" 
                         style="max-height: 300px">
                </div>
                <div class="col-12">
                    <h4>{{ $project->name }}</h4>
                    <div class="description-container mt-3">
                        <p style="white-space: pre-line;">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
