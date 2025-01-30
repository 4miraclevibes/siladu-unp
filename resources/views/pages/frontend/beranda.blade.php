@extends('layouts.frontend.main')

@section('content')

<div class="container">
    <div class="row align-items-center bg-light">
        <div class="col-md-6">
            <h5 class="display-5">Selamat Datang Di Website UPT. Laboratorium Terpadu</h5>
            <p class="lead">Pusat pelayanan
                UPT. laboratorium terpadu Universitas Negeri Padang
                menyediakan berbagai jenis layanan pengujian yang
                telah terakredetasi nasional dan internasional
                dan diakui oleh komite akredetasi nasional</p>
        </div>
        <div class="col-md-6 text-center p-0">
            <img src="{{ asset('assets/img/backgrounds/labor.jpg') }}" class="img-fluid" alt="Banner Image">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 bg-dark text-white p-5">
            <h2>Pengujian Telah Terstandar SNI ISO/IEC 17025:2017</h2>
            <p>Kunjungi Sistem Informasi Laboratorium Terpadu UNP
                untuk akses informasi lengkap, melakukan pendaftaran pengujian,
                melihat status pengujian, mengunduh hasil pengujian,
                dan berbagai layanan digital lainnya. Kami berkomitmen
                memberikan pelayanan terbaik dengan standar internasional
                untuk memenuhi kebutuhan pengujian Anda.</p>
        </div>
        <div class="col-md-6 bg-light p-5">
            <h4>Panduan Mutu</h4>
            <p>
                <ol>
                    <li>Acuan dalam penerapan sistem manajemen berdasarkan ISO/IEC 17025:2017.</li>
                    <li>Acuan dalam pelaksanaan audit implementasi sistem manajemen baik audit internal maupun audit yang dilakukan oleh pihak ketiga (audit eksternal).</li>
                    <li>Acuan dalam upaya peningkatan dan pemeliharaan kinerja.</li>
                    <li>Bukti telah menerapkan Sistem Manajemen Mutu laboratorium berdasarkan ISO/IEC 17025:2017</li>
                </ol>
            </p>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <img src="{{ asset('frontend/assets/images/mask-group.png') }}" class="img-fluid" alt="Mask Group Image">
        </div>
        <div class="col-md-6">
            <h2>Tentang Laboratorium Terpadu UNP</h2>
            <div class="mt-4">
                <h5><i class='bx bx-building'></i> Dasar Hukum</h5>
                <p>Laboratorium Terpadu Universitas Negeri Padang merupakan salah satu divisi pada Pusat Pengembangan Laboratorium Terpadu di lingkungan UNP yang berdiri berdasarkan Surat Keputusan Rektor No. 3509 Tahun 2017 tentang Standar Pelayanan Publik Universitas Negeri Padang, dan Surat Keputusan Rektor No. 143 Tahun 2021 tentang Penunjukkan Tim Pengelola Laboratorium Terpadu Universitas Negeri Padang.</p>
            </div>
            <div class="mt-4">
                <h5><i class='bx bx-user'></i> Kepemimpinan</h5>
                <p>Laboratorium Terpadu dipimpin oleh seorang Kepala Pusat Pengembangan Laboratorium Terpadu dan bertanggung jawab kepada Rektor melalui Penanggungjawab sekaligus Ketua Lembaga Pengembangan Pembelajaran dan Penjaminan Mutu (LP3M).</p>
            </div>
            <div class="mt-4">
                <h5><i class='bx bx-task'></i> Tugas dan Panduan</h5>
                <p>Laboratorium Terpadu Universitas Negeri Padang mempunyai tugas melaksanakan layanan laboratorium untuk kegiatan pengujian dan kalibrasi, pendidikan, penelitian dan pengabdian kepada masyarakat. Panduan Mutu Laboratorium Terpadu Universitas Negeri Padang disusun berdasarkan ISO/IEC 17025:2017 mengenai Persyaratan Umum Kompetensi Laboratorium Pengujian dan Kalibrasi sesuai dengan ruang lingkup laboratorium.</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="mb-4">Pengujian</h2>
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $project->image) }}" 
                     class="card-img-top" 
                     alt="Gambar Pengujian"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('project.detail', $project) }}" 
                       class="btn btn-primary btn-sm">
                        Lihat Detail Pengujian
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center bg-dark">
        <div class="col-md-8 text-white p-5">
            <h2 class="display-5">Lorem ipsum dolor <br>sit amet consectetur</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class='bx bx-check'></i> Lorem ipsum dolor sit</li>
                <li class="mb-2"><i class='bx bx-check'></i> Consectetur adipiscing</li>
                <li class="mb-2"><i class='bx bx-check'></i> Sed do eiusmod tempor</li>
            </ul>
            <a href="#" class="btn btn-light">Lorem ipsum</a>
        </div>
        <div class="col-md-4 text-center p-0">
            <img src="{{ asset('assets/img/backgrounds/labor.jpg') }}" class="img-fluid" alt="People Image">
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-4 text-center">
            <img src="{{ asset('frontend/assets/images/costumer.svg') }}" class="img-fluid" alt="Customer Image">
        </div>
        <div class="col-md-8">
            <h5 class="text-primary">Lorem Ipsum</h5>
            <h2>Dolor sit amet consectetur</h2>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/avatars/1.png') }}" class="rounded-circle me-3" alt="Customer Avatar" width="50" height="50">
                <div>
                    <h5 class="mb-0">Lorem Ipsum</h5>
                    <p class="mb-0">Dolor sit</p>
                    <div class="text-warning">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection