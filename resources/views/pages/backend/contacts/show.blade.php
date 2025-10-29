@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Pesan Kontak</h5>
            @if($contact->status === 'unread')
                <span class="badge bg-warning">Belum Dibaca</span>
            @else
                <span class="badge bg-success">Sudah Dibaca</span>
            @endif
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pengirim</label>
                        <p class="form-control-plaintext">{{ $contact->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <p class="form-control-plaintext">
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Instansi</label>
                        <p class="form-control-plaintext">{{ $contact->institution ?? '-' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Dikirim</label>
                        <p class="form-control-plaintext">{{ $contact->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pesan</label>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-0" style="white-space: pre-line;">{{ $contact->message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            @if($contact->status === 'unread')
                                <span class="badge bg-warning">
                                    <i class='bx bx-envelope'></i> Belum Dibaca
                                </span>
                            @else
                                <span class="badge bg-success">
                                    <i class='bx bx-envelope-open'></i> Sudah Dibaca
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary me-1">
                        <i class='bx bx-arrow-back'></i> Kembali
                    </a>
                    <a href="mailto:{{ $contact->email }}" class="btn btn-primary me-1">
                        <i class='bx bx-envelope'></i> Balas Email
                    </a>
                    @if($contact->status === 'unread')
                        <form action="{{ route('contacts.mark-read', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success me-1">
                                <i class='bx bx-check'></i> Tandai Sudah Dibaca
                            </button>
                        </form>
                    @else
                        <form action="{{ route('contacts.mark-unread', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning me-1">
                                <i class='bx bx-undo'></i> Tandai Belum Dibaca
                            </button>
                        </form>
                    @endif
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                            <i class='bx bx-trash'></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

