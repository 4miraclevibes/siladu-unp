@extends('layouts.frontend.main')

@section('content')
<!-- Hero Section dengan Carousel -->
<div class="hero-section">
    <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('frontend/carousel/img1.jpg') }}" class="d-block w-100" alt="Gambar 1">
                <div class="carousel-caption">
                    <h1 data-aos="fade-up">Profil Laboratorium Terpadu</h1>
                    <p data-aos="fade-up" data-aos-delay="200">Universitas Negeri Padang</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('frontend/carousel/img2.jpeg') }}" class="d-block w-100" alt="Gambar 2">
                <div class="carousel-caption">
                    <h1 data-aos="fade-up">Fasilitas Modern</h1>
                    <p data-aos="fade-up" data-aos-delay="200">Standar Internasional</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('frontend/carousel/img3.jpeg') }}" class="d-block w-100" alt="Gambar 3">
                <div class="carousel-caption">
                    <h1 data-aos="fade-up">Layanan Prima</h1>
                    <p data-aos="fade-up" data-aos-delay="200">Profesional dan Terpercaya</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#profileCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#profileCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<div class="container py-5">
    <!-- Sejarah Section -->
    <div class="row mb-5">
        <div class="col-12" data-aos="fade-up">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <i class='bx bx-history text-primary' style="font-size: 2.5rem;"></i>
                        <h2 class="card-title mb-0 ms-3 fw-bold">Sejarah Singkat</h2>
                    </div>
                    <p class="text-justify" style="line-height: 1.8;">
                        Laboratorium Terpadu Universitas Negeri Padang merupakan salah satu divisi pada Pusat Pengembangan Laboratorium Terpadu di lingkungan UNP yang berdiri berdasarkan Surat Keputusan Rektor No. 3509 Tahun 2017 tentang Standar Pelayanan Publik Universitas Negeri Padang, dan Surat Keputusan Rektor No. 143 Tahun 2021 tentang Penunjukkan Tim Pengelola Laboratorium Terpadu Universitas Negeri Padang.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi Section -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class='bx bx-bullseye text-primary' style="font-size: 3rem;"></i>
                        <h3 class="card-title mt-3 fw-bold">Visi</h3>
                    </div>
                    <p class="text-justify" style="line-height: 1.8;">
                        "Menjadi Laboratorium Terpadu yang terkemuka, terakreditasi, dan berstandar internasional dalam melayani penelitian, pengujian dan pelatihan untuk mendukung Universitas Negeri Padang sebagai universitas riset yang unggul"
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class='bx bx-target-lock text-primary' style="font-size: 3rem;"></i>
                        <h3 class="card-title mt-3 fw-bold">Misi</h3>
                    </div>
                    <ol class="custom-list">
                        <li class="mb-3">Menyediakan sarana dan prasarana untuk kegiatan penelitian, pengembangan, inovasi dalam bisnis sains, teknologi, dan sosial humaniora.</li>
                        <li class="mb-3">Menyediakan layanan penelitian dan pengembangan yang berkelanjutan dalam bidang sains, teknologi, sosial humaniora.</li>
                        <li class="mb-3">Menyediakan sumber daya penelitian yang berkompeten dan berkualitas.</li>
                        <li class="mb-3">Memberikan layanan pengujian/analisis laboratorium yang akurat dan valid.</li>
                        <li>Memberikan layanan kerjasama bidang penelitian, pelatihan, dan pengujian laboratorium.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Tujuan Section -->
    <div class="row mb-5">
        <div class="col-12" data-aos="fade-up" data-aos-delay="300">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class='bx bx-trophy text-primary' style="font-size: 3rem;"></i>
                        <h3 class="card-title mt-3 fw-bold">Tujuan</h3>
                    </div>
                    <div class="row g-4">
                        @foreach([
                            'Memberikan layanan barang dan jasa yang berkualitas, transparan, akuntabel dan profesional.',
                            'Menghasilkan labor pengujian yang terpercaya sesuai dengan standar SNI ISO/IEC 17025:2017.',
                            'Menghasilkan standar informasi seluruh aset laboratorium di UNP.',
                            'Meningkatkan kuantitas dan kualitas kerjasama yang produktif dan bereputasi global.',
                            'Mewujudkan tata kelola Laboratorium Terpadu yang transparan dan akuntabel.',
                            'Menghasilkan labor-labor yang unggul melalui program akreditasi/sertifikasi.'
                        ] as $index => $tujuan)
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="feature-icon-small bg-primary text-white rounded-circle me-3 p-2">
                                    {{ $index + 1 }}
                                </div>
                                <p class="mb-3">{{ $tujuan }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panduan Mutu Section -->
    <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-delay="400">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class='bx bx-book-open text-primary' style="font-size: 3rem;"></i>
                        <h3 class="card-title mt-3 fw-bold">Panduan Mutu</h3>
                    </div>
                    <p class="text-center mb-4">
                        Panduan Mutu Laboratorium Terpadu UNP disusun berdasarkan ISO/IEC 17025:2017
                    </p>
                    <div class="row g-4">
                        @foreach([
                            'Acuan dalam penerapan sistem manajemen ISO/IEC 17025:2017',
                            'Acuan dalam pelaksanaan audit implementasi sistem manajemen',
                            'Acuan dalam upaya peningkatan dan pemeliharaan kinerja',
                            'Bukti penerapan Sistem Manajemen Mutu laboratorium'
                        ] as $panduan)
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 border-0 bg-light">
                                <div class="card-body p-4 text-center">
                                    <i class='bx bx-check-circle text-primary mb-3' style="font-size: 2rem;"></i>
                                    <p class="mb-0">{{ $panduan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.hero-section {
    position: relative;
}

.hero-section .carousel-item {
    height: 80vh;
}

.hero-section .carousel-item img {
    object-fit: cover;
    height: 100%;
}

.hero-section .carousel-caption {
    background: rgba(0, 0, 0, 0.5);
    padding: 2rem;
    border-radius: 10px;
}

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

.feature-icon-small {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.bg-light {
    background-color: #f8f9fa !important;
}
</style>
@endpush

@endsection