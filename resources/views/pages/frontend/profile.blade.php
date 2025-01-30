@extends('layouts.frontend.main')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="position-relative mb-5">
        <div class="overlay-dark" style="
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8));
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;">
        </div>
        <img src="{{ asset('assets/img/backgrounds/labor.jpg') }}" 
             class="w-100" 
             alt="Laboratorium Terpadu UNP"
             style="height: 500px; object-fit: cover;">
        <div class="position-absolute text-white text-center" 
             style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
            <h1 class="display-4 fw-bold mb-4">Laboratorium Terpadu</h1>
            <h2 class="h3">Universitas Negeri Padang</h2>
        </div>
    </div>

    <div class="container">
        <!-- Sejarah Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title mb-4 fw-bold text-center">Sejarah Singkat</h2>
                        <p class="text-justify" style="line-height: 1.8;">
                            Laboratorium Terpadu Universitas Negeri Padang merupakan salah satu divisi pada Pusat Pengembangan Laboratorium Terpadu di lingkungan UNP yang berdiri berdasarkan Surat Keputusan Rektor No. 3509 Tahun 2017 tentang Standar Pelayanan Publik Universitas Negeri Padang, dan Surat Keputusan Rektor No. 143 Tahun 2021 tentang Penunjukkan Tim Pengelola Laboratorium Terpadu Universitas Negeri Padang.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Misi Tujuan Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- Visi -->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <i class='bx bx-bullseye text-primary' style="font-size: 2rem;"></i>
                                <h3 class="card-title mb-0 ms-3 fw-bold">Visi</h3>
                            </div>
                            <p class="text-justify" style="line-height: 1.8;">
                                "Menjadi Laboratorium Terpadu yang terkemuka, terakreditasi, dan berstandar internasional dalam melayani penelitian, pengujian dan pelatihan untuk mendukung Universitas Negeri Padang sebagai universitas riset yang unggul"
                            </p>
                        </div>

                        <!-- Misi -->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <i class='bx bx-target-lock text-primary' style="font-size: 2rem;"></i>
                                <h3 class="card-title mb-0 ms-3 fw-bold">Misi</h3>
                            </div>
                            <ol class="custom-list">
                                <li class="mb-3">Menyediakan sarana dan prasarana untuk kegiatan penelitian, pengembangan, inovasi dalam bisnis sains, teknologi, dan sosial humaniora untuk civitas academica Universitas Negeri Padang, instansi/lembaga penelitian, masyarakat dan industri.</li>
                                <li class="mb-3">Menyediakan layanan penelitian dan pengembangan yang berkelanjutan dalam bidang sains, teknologi, sosial humaniora untuk civitas academica Universitas Negeri Padang, instansi/lembaga penelitian, masyarakat dan industri.</li>
                                <li class="mb-3">Menyediakan sumber daya penelitian yang berkompeten dan Berkualitas</li>
                                <li class="mb-3">Memberikan layanan pengujian/analisis laboratorium, sertifikasi, kalibrasi yang dapat dipertanggungjawabkan keakuratan dan keabsahan hasil kegiatannya.</li>
                                <li>Memberikan layanan kerjasama bidang penelitian, pelatihan, pengujian/analisis laboratorium dengan instansi dan industri baik dalam negeri maupun luar negeri.</li>
                            </ol>
                        </div>

                        <!-- Tujuan -->
                        <div>
                            <div class="d-flex align-items-center mb-4">
                                <i class='bx bx-trophy text-primary' style="font-size: 2rem;"></i>
                                <h3 class="card-title mb-0 ms-3 fw-bold">Tujuan</h3>
                            </div>
                            <ol class="custom-list">
                                <li class="mb-3">Memberikan layanan barang dan jasa yang berkualitas, transparan, akuntabel dan profesional di tingkat nasional dan internasional.</li>
                                <li class="mb-3">Menghasilkan labor pengujian yang terpercaya sesuai dengan standar SNI ISO/IEC 17025:2017</li>
                                <li class="mb-3">Menghasilkan standar informasi seluruh aset laboratorium di Universitas Negeri Padang</li>
                                <li class="mb-3">Meningkatkan kuantitas dan kualitas kerjasama yang produktif dan bereputasi global</li>
                                <li class="mb-3">Mewujudkan tata kelola Laboratorium Terpadu yang transparan, akuntabel, bertanggung jawab dan adil.</li>
                                <li>Menghasilkan labor-labor yang unggul melalui program akreditasi/ sertifikasi peralatan laboratorium di tingkat nasional dan internasional.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kepemimpinan & Tugas Section -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <i class='bx bx-user-circle text-primary' style="font-size: 2rem;"></i>
                            <h3 class="card-title mb-0 ms-3 fw-bold">Kepemimpinan</h3>
                        </div>
                        <p class="text-justify" style="line-height: 1.8;">
                            Laboratorium Terpadu dipimpin oleh seorang Kepala Pusat Pengembangan Laboratorium Terpadu dan bertanggung jawab kepada Rektor melalui Penanggungjawab sekaligus Ketua Lembaga Pengembangan Pembelajaran dan Penjaminan Mutu (LP3M).
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <i class='bx bx-task text-primary' style="font-size: 2rem;"></i>
                            <h3 class="card-title mb-0 ms-3 fw-bold">Tugas</h3>
                        </div>
                        <p class="text-justify" style="line-height: 1.8;">
                            Laboratorium Terpadu Universitas Negeri Padang mempunyai tugas melaksanakan layanan laboratorium untuk kegiatan pengujian dan kalibrasi, pendidikan, penelitian dan pengabdian kepada masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panduan Mutu Section -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class='bx bx-book-open text-primary' style="font-size: 2rem;"></i>
                    <h3 class="card-title mb-0 ms-3 fw-bold">Panduan Mutu</h3>
                </div>
                <p class="mb-4">
                    Panduan Mutu Laboratorium Terpadu Universitas Negeri Padang disusun berdasarkan ISO/IEC 17025:2017 mengenai Persyaratan Umum Kompetensi Laboratorium Pengujian dan Kalibrasi sesuai dengan ruang lingkup laboratorium.
                </p>
                <div class="ms-4">
                    <ol class="custom-list">
                        <li class="mb-3">Acuan dalam penerapan sistem manajemen berdasarkan ISO/IEC 17025:2017.</li>
                        <li class="mb-3">Acuan dalam pelaksanaan audit implementasi sistem manajemen baik audit internal maupun audit yang dilakukan oleh pihak ketiga (audit eksternal).</li>
                        <li class="mb-3">Acuan dalam upaya peningkatan dan pemeliharaan kinerja.</li>
                        <li>Bukti telah menerapkan Sistem Manajemen Mutu laboratorium berdasarkan ISO/IEC 17025:2017</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .text-justify {
        text-align: justify;
    }
    .custom-list li {
        line-height: 1.8;
        position: relative;
        color: #566a7f;
    }
    .card {
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush