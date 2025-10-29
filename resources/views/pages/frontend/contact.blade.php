@extends('layouts.frontend.main')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="mb-4">Hubungi Kami</h1>
        </div>
    </div>

    @if(session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class='bx bx-check-circle'></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <!-- Kolom Kiri - Map dan Info Kontak -->
        <div class="col-md-6">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7978.652672053368!2d100.347748!3d-0.8997900000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9a435337cdf%3A0xe402340daf876367!2sLaboratorium%20Terpadu%20Fakultas%20Teknik%20Universitas%20Negeri%20Padang!5e0!3m2!1sid!2sid!4v1739777659723!5m2!1sid!2sid"
                width="100%"
                height="300"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <div class="mt-4">
                <p><i class="bx bx-map"></i> Jl. Prof. Dr. Hamka, Air Tawar Bar., Kec. Padang Utara, Kota Padang, Sumatera Barat 25171</p>
                <p><i class="bx bx-phone"></i> 0822-8757-9638</p>
                <p><i class="bx bx-phone"></i> 0853-56001235</p>
                <p><i class="bx bx-envelope"></i> labterpadu@unp.ac.id</p>
                <p><i class="bx bx-globe"></i> https://labterpadu.unp.ac.id/</p>
            </div>
        </div>

        <!-- Kolom Kanan - Form -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required>
                    <small class="text-danger">* wajib diisi</small>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="institution" class="form-label">Instansi</label>
                    <input type="text"
                           class="form-control @error('institution') is-invalid @enderror"
                           id="institution"
                           name="institution"
                           value="{{ old('institution') }}">
                    <small class="text-muted">tidak wajib diisi</small>
                    @error('institution')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required>
                    <small class="text-danger">* wajib diisi</small>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control @error('message') is-invalid @enderror"
                              id="message"
                              name="message"
                              rows="5"
                              required>{{ old('message') }}</textarea>
                    <small class="text-danger">* wajib diisi</small>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .form-control {
        border-radius: 0;
    }
    .btn-primary {
        border-radius: 0;
    }
    i {
        width: 20px;
        margin-right: 10px;
    }
</style>
@endpush
@endsection
