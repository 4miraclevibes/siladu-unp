@extends('layouts.frontend.main')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="mb-4">Hubungi Kami</h1>
        </div>
    </div>

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
                <p><i class="bi bi-geo-alt-fill"></i> Jl. Prof. Dr. Hamka, Air Tawar Bar., Kec. Padang Utara, Kota Padang, Sumatera Barat 25171</p>
                <p><i class="bi bi-telephone-fill"></i> 0822-8757-9638</p>
                <p><i class="bi bi-telephone-fill"></i> 0853-56001235</p>
                <p><i class="bi bi-envelope-fill"></i> labterpadu@unp.ac.id</p>
                <p><i class="bi bi-globe"></i> https://labterpadu.unp.ac.id/</p>
            </div>
        </div>

        <!-- Kolom Kanan - Form -->
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama">
                    <small class="text-danger">* wajib diisi</small>
                </div>

                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi</label>
                    <input type="text" class="form-control" id="instansi">
                    <small class="text-muted">tidak wajib diisi</small>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                    <small class="text-danger">* wajib diisi</small>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" rows="5"></textarea>
                    <small class="text-danger">* wajib diisi</small>
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
