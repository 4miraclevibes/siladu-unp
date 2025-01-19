@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Detail Pengumuman</h5>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Judul Pengumuman</label>
                        <p class="form-control-plaintext">{{ $announcement->title }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Konten Pengumuman</label>
                        <div class="form-control-plaintext">
                            {!! $announcement->content !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $announcement->status === 'publish' ? 'success' : 'secondary' }}">
                                {{ $announcement->status === 'publish' ? 'Publish' : 'Draft' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Dibuat Oleh</label>
                        <p class="form-control-plaintext">{{ $announcement->user->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Dibuat</label>
                        <p class="form-control-plaintext">{{ $announcement->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('announcements.index') }}" class="btn btn-secondary me-1">Kembali</a>
                    <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-warning me-1">Edit</a>
                    <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


