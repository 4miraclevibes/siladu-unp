@extends('layouts.frontend.main')

@section('content')

<!-- Hero Section dengan Carousel -->
<div class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        @if($heroCarousels->count() > 1)
        <div class="carousel-indicators">
            @foreach($heroCarousels as $index => $carousel)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"></button>
            @endforeach
        </div>
        @endif
        <div class="carousel-inner">
            @forelse($heroCarousels as $index => $carousel)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $carousel->image) }}" class="d-block w-100" alt="{{ $carousel->title }}">
                <div class="carousel-caption">
                    <h1 data-aos="fade-up">{{ $carousel->title }}</h1>
                    @if($carousel->subtitle)
                    <p data-aos="fade-up" data-aos-delay="200">{{ $carousel->subtitle }}</p>
                    @endif
                </div>
            </div>
            @empty
            <div class="carousel-item active">
                <img src="{{ asset('frontend/carousel/img1.jpg') }}" class="d-block w-100" alt="Default">
                <div class="carousel-caption">
                    <h1 data-aos="fade-up">UPT Laboratorium Terpadu UNP</h1>
                    <p data-aos="fade-up" data-aos-delay="200">Pusat Layanan Pengujian Berkualitas</p>
                </div>
            </div>
            @endforelse
        </div>
        @if($heroCarousels->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        @endif
    </div>
</div>

<!-- Announcement Bar -->
@if($announcementBars->count() > 0)
<div class="announcement-bar bg-primary py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between text-white">
            <div class="d-flex align-items-center" style="width: 100%;">
                <i class='bx bx-broadcast me-2'></i>
                <marquee behavior="scroll" direction="left" scrollamount="5">
                    @foreach($announcementBars as $bar)
                        {{ $bar->text }}{{ !$loop->last ? ' - ' : '' }}
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Welcome Section -->
<section class="welcome-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4">Selamat Datang Di UPT. Laboratorium Terpadu</h1>
                <p class="lead text-muted">Pusat pelayanan UPT. laboratorium terpadu Universitas Negeri Padang menyediakan berbagai jenis layanan pengujian yang telah terakredetasi nasional dan internasional.</p>
                <a href="#services" class="btn btn-primary btn-lg mt-3">Jelajahi Layanan</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('assets/img/backgrounds/labor.jpg') }}" class="img-fluid rounded-3 shadow" alt="Laboratory">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="feature-icon mb-3">
                            <i class='bx bx-certification text-primary display-4'></i>
                        </div>
                        <h4>Terakreditasi</h4>
                        <p class="text-muted">Pengujian Telah Terstandar SNI ISO/IEC 17025:2017</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="feature-icon mb-3">
                            <i class='bx bx-test-tube text-primary display-4'></i>
                        </div>
                        <h4>Pengujian Modern</h4>
                        <p class="text-muted">Dilengkapi dengan peralatan modern dan staff ahli</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="feature-icon mb-3">
                            <i class='bx bx-support text-primary display-4'></i>
                        </div>
                        <h4>Layanan Prima</h4>
                        <p class="text-muted">Didukung oleh tim profesional yang berpengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Layanan Pengujian</h2>
        <div class="row g-4">
            @foreach ($projects as $project)
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card h-100 shadow-sm"
                     style="border: 3px solid #e0e0e0; transition: all 0.4s ease; background-color: #ffffff;"
                     onmouseover="this.style.transform='scale(1.03) translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0, 123, 255, 0.4)'; this.style.borderColor='#007bff'; this.style.borderWidth='4px'; this.style.backgroundColor='#f0f8ff'; this.querySelector('.card-title').style.color='#007bff'; this.querySelector('.card-title').style.fontWeight='bold'; this.querySelector('.btn').style.backgroundColor='#007bff'; this.querySelector('.btn').style.color='white'; this.querySelector('.btn').style.transform='scale(1.05)'; this.querySelector('.btn').style.fontWeight='bold';"
                     onmouseout="this.style.transform='scale(1) translateY(0)'; this.style.boxShadow=''; this.style.borderColor='#e0e0e0'; this.style.borderWidth='3px'; this.style.backgroundColor='#ffffff'; this.querySelector('.card-title').style.color=''; this.querySelector('.card-title').style.fontWeight=''; this.querySelector('.btn').style.backgroundColor=''; this.querySelector('.btn').style.color=''; this.querySelector('.btn').style.transform='scale(1)'; this.querySelector('.btn').style.fontWeight='';">
                    <img src="{{ asset('storage/' . $project->image) }}"
                         class="card-img-top"
                         alt="Gambar Pengujian"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="transition: all 0.3s ease;">{{ $project->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($project->description, 100) }}</p>
                        <a href="{{ route('project.detail', $project) }}"
                           class="btn btn-outline-primary"
                           style="transition: all 0.3s ease;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- News & Announcements Section -->
<section class="news-section py-5">
    <div class="container">
        <div class="row mb-5">
            <!-- Announcements Section -->
            <div class="col-12 mb-5" data-aos="fade-up">
                <div class="d-flex align-items-center mb-4">
                    <i class='bx bx-news text-primary display-4 me-3'></i>
                    <h3 class="mb-0">Berita Terbaru</h3>
                </div>
                <div class="row g-4">
                    @foreach($announcements->take(4) as $announcement)
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow-sm"
                             style="border: 3px solid #e0e0e0; transition: all 0.4s ease; background-color: #ffffff;"
                             onmouseover="this.style.transform='scale(1.03) translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0, 123, 255, 0.4)'; this.style.borderColor='#007bff'; this.style.borderWidth='4px'; this.style.backgroundColor='#f0f8ff'; this.querySelector('.card-title').style.color='#007bff'; this.querySelector('.card-title').style.fontWeight='bold'; this.querySelector('.btn').style.backgroundColor='#007bff'; this.querySelector('.btn').style.color='white'; this.querySelector('.btn').style.transform='scale(1.05)'; this.querySelector('.btn').style.fontWeight='bold';"
                             onmouseout="this.style.transform='scale(1) translateY(0)'; this.style.boxShadow=''; this.style.borderColor='#e0e0e0'; this.style.borderWidth='3px'; this.style.backgroundColor='#ffffff'; this.querySelector('.card-title').style.color=''; this.querySelector('.card-title').style.fontWeight=''; this.querySelector('.btn').style.backgroundColor=''; this.querySelector('.btn').style.color=''; this.querySelector('.btn').style.transform='scale(1)'; this.querySelector('.btn').style.fontWeight='';">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $announcement->thumbnail) }}"
                                     alt="{{ $announcement->title }}"
                                     class="card-img-top"
                                     style="height: 200px; object-fit: cover;">
                                <span class="badge bg-primary position-absolute bottom-0 end-0 m-2">
                                    {{ $announcement->created_at->format('M Y') }}
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-3" style="transition: all 0.3s ease;">
                                    {{ Str::limit($announcement->title, 50) }}
                                </h5>
                                <p class="card-text text-muted mb-3 flex-grow-1">
                                    {!! Str::limit(strip_tags($announcement->content), 80) !!}
                                </p>
                                <a href="{{ route('announcement.show', $announcement) }}"
                                   class="btn btn-outline-primary btn-sm mt-auto"
                                   style="transition: all 0.3s ease;">
                                    Selengkapnya...
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Articles Section -->
            <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex align-items-center mb-4">
                    <i class='bx bx-book-open text-primary display-4 me-3'></i>
                    <h3 class="mb-0">Artikel Terbaru</h3>
                </div>
                <div class="row g-4">
                    @foreach($articles->take(4) as $article)
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow-sm"
                             style="border: 3px solid #e0e0e0; transition: all 0.4s ease; background-color: #ffffff;"
                             onmouseover="this.style.transform='scale(1.03) translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0, 123, 255, 0.4)'; this.style.borderColor='#007bff'; this.style.borderWidth='4px'; this.style.backgroundColor='#f0f8ff'; this.querySelector('.card-title').style.color='#007bff'; this.querySelector('.card-title').style.fontWeight='bold'; this.querySelector('.btn').style.backgroundColor='#007bff'; this.querySelector('.btn').style.color='white'; this.querySelector('.btn').style.transform='scale(1.05)'; this.querySelector('.btn').style.fontWeight='bold';"
                             onmouseout="this.style.transform='scale(1) translateY(0)'; this.style.boxShadow=''; this.style.borderColor='#e0e0e0'; this.style.borderWidth='3px'; this.style.backgroundColor='#ffffff'; this.querySelector('.card-title').style.color=''; this.querySelector('.card-title').style.fontWeight=''; this.querySelector('.btn').style.backgroundColor=''; this.querySelector('.btn').style.color=''; this.querySelector('.btn').style.transform='scale(1)'; this.querySelector('.btn').style.fontWeight='';">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                     alt="{{ $article->title }}"
                                     class="card-img-top"
                                     style="height: 200px; object-fit: cover;">
                                <span class="badge bg-primary position-absolute bottom-0 end-0 m-2">
                                    {{ $article->created_at->format('M Y') }}
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-3" style="transition: all 0.3s ease;">
                                    {{ Str::limit($article->title, 50) }}
                                </h5>
                                <p class="card-text text-muted mb-3 flex-grow-1">
                                    {!! Str::limit(strip_tags($article->content), 80) !!}
                                </p>
                                <a href="{{ route('article.show', $article) }}"
                                   class="btn btn-outline-primary btn-sm mt-auto"
                                   style="transition: all 0.3s ease;">
                                    Selengkapnya...
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <!-- About Section -->
<section class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('frontend/assets/images/mask-group.png') }}" class="img-fluid" alt="About Us">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="mb-4">Tentang Laboratorium Terpadu UNP</h2>
                <div class="accordion" id="aboutAccordion">
                    <!-- Item Dasar Hukum -->
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class='bx bx-building me-2'></i> Dasar Hukum
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#aboutAccordion">
                            <div class="accordion-body text-muted">
                                Laboratorium Terpadu UNP berdiri berdasarkan SK Rektor No. 3509 Tahun 2017 dan SK Rektor No. 143 Tahun 2021.
                            </div>
                        </div>
                    </div>

                    <!-- Item Kepemimpinan -->
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class='bx bx-user me-2'></i> Kepemimpinan
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#aboutAccordion">
                            <div class="accordion-body text-muted">
                                Laboratorium Terpadu UNP dipimpin oleh seorang Kepala yang bertanggung jawab langsung kepada Rektor.
                            </div>
                        </div>
                    </div>

                    <!-- Item Tugas -->
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class='bx bx-task me-2'></i> Tugas
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#aboutAccordion">
                            <div class="accordion-body text-muted">
                                Melaksanakan layanan pengujian laboratorium untuk mendukung kegiatan akademik dan non-akademik.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Statistik & Pencapaian Section -->
<section class="achievement-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" data-aos="fade-up">Statistik & Pencapaian</h2>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Komitmen kami dalam memberikan layanan terbaik</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 bg-primary text-white h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class='bx bx-test-tube display-4 mb-3'></i>
                        <h3 class="counter mb-2">500+</h3>
                        <p class="mb-0">Pengujian Selesai</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 bg-success text-white h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class='bx bx-building-house display-4 mb-3'></i>
                        <h3 class="counter mb-2">10+</h3>
                        <p class="mb-0">Laboratorium Terakreditasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 bg-info text-white h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class='bx bx-user-check display-4 mb-3'></i>
                        <h3 class="counter mb-2">50+</h3>
                        <p class="mb-0">Staff Ahli</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 bg-warning text-white h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class='bx bx-certification display-4 mb-3'></i>
                        <h3 class="counter mb-2">15+</h3>
                        <p class="mb-0">Sertifikasi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Pencapaian -->
        <section class="timeline-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold" data-aos="fade-up">Perjalanan & Pencapaian</h2>
                    <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Komitmen pengembangan laboratorium dari masa ke masa</p>
                </div>
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="timeline">
                                    @forelse($timelines as $timeline)
                                    <div class="timeline-item">
                                        <div class="timeline-dot bg-{{ $timeline->color }}"></div>
                                        <div class="timeline-content">
                                            <div class="row align-items-center">
                                                @if($timeline->image)
                                                <div class="col-md-4">
                                                    <img src="{{ asset('storage/' . $timeline->image) }}"
                                                         class="img-fluid rounded shadow-sm mb-3 mb-md-0"
                                                         alt="{{ $timeline->year }}">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>{{ $timeline->year }}</h5>
                                                    <h6 class="fw-bold">{{ $timeline->title }}</h6>
                                                    <p>{{ $timeline->description }}</p>
                                                </div>
                                                @else
                                                <div class="col-12">
                                                    <h5>{{ $timeline->year }}</h5>
                                                    <h6 class="fw-bold">{{ $timeline->title }}</h6>
                                                    <p>{{ $timeline->description }}</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="timeline-item">
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="timeline-content">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('frontend/carousel/img1.jpg') }}" class="img-fluid rounded shadow-sm mb-3 mb-md-0" alt="2017">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>2017</h5>
                                                    <p>Pendirian UPT Laboratorium Terpadu UNP</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-dot bg-success"></div>
                                        <div class="timeline-content">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('frontend/carousel/img2.jpeg') }}" class="img-fluid rounded shadow-sm mb-3 mb-md-0" alt="2019">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>2019</h5>
                                                    <p>Akreditasi ISO/IEC 17025:2017</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-dot bg-info"></div>
                                        <div class="timeline-content">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('frontend/carousel/img3.jpeg') }}" class="img-fluid rounded shadow-sm mb-3 mb-md-0" alt="2021">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>2021</h5>
                                                    <p>Pengembangan Fasilitas Modern</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-dot bg-warning"></div>
                                        <div class="timeline-content">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('frontend/carousel/img1.jpg') }}" class="img-fluid rounded shadow-sm mb-3 mb-md-0" alt="2023">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>2023</h5>
                                                    <p>Perluasan Layanan Pengujian</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

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

.feature-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.announcement-bar marquee {
    font-weight: 500;
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

/* Project Card Hover Effects - KONTRAS TINGGI */
.testing-section .card {
    transition: all 0.4s ease;
    border: 3px solid #e0e0e0;
    background-color: #ffffff;
}

/* Effect 1: Pop up ketika kursor melewati area */
.testing-section .card:hover {
    transform: scale(1.1) translateY(-15px) !important;
    box-shadow: 0 15px 40px rgba(0, 123, 255, 0.4) !important;
}

/* Effect 2: Garis tepi berubah warna */
.testing-section .card:hover {
    border-color: #007bff !important;
    border-width: 4px !important;
    background-color: #f0f8ff !important;
}

/* Effect 3: Kotak selengkapnya berubah warna */
.testing-section .card .btn-outline-primary {
    transition: all 0.3s ease;
    background-color: transparent;
    border: 2px solid #007bff;
}

.testing-section .card:hover .btn-outline-primary {
    background-color: #007bff !important;
    color: white !important;
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.5) !important;
    border-color: #007bff;
    font-weight: bold;
}

.testing-section .card:hover .card-title {
    color: #007bff !important;
    font-weight: bold;
}

.accordion-item {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.accordion-button {
    background: #fff;
    padding: 1rem 1.25rem;
    font-weight: 500;
    border: none;
    transition: all 0.3s ease;
}

.accordion-button:not(.collapsed) {
    background-color: var(--bs-primary);
    color: white;
}

.accordion-button::after {
    transition: transform 0.3s ease;
}

.accordion-button:not(.collapsed)::after {
    transform: rotate(-180deg);
}

.accordion-body {
    padding: 1rem 1.25rem;
    background: #fff;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: rgba(0,0,0,.125);
}

.accordion-button:hover {
    background-color: rgba(var(--bs-primary-rgb), 0.1);
}

.timeline {
    position: relative;
    padding: 20px 0;
}

.timeline::before {
    content: '';
    position: absolute;
    width: 2px;
    background: #e9ecef;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -1px;
}

.timeline-item {
    margin-bottom: 30px;
    position: relative;
}

.timeline-dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    position: absolute;
    left: 50%;
    top: 0;
    margin-left: -8px;
}

.timeline-content {
    width: calc(50% - 30px);
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    position: relative;
}

.timeline-item:nth-child(odd) .timeline-content {
    margin-left: auto;
}

.timeline-content h5 {
    margin: 0 0 10px;
    color: var(--bs-primary);
}

.counter {
    font-size: 2.5rem;
    font-weight: bold;
}

.achievement-section .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.achievement-section .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.timeline-content img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.timeline-content {
    padding: 25px;
}

.timeline-content h5 {
    color: var(--bs-primary);
    font-weight: bold;
    margin-bottom: 15px;
}

.timeline-content p {
    color: #6c757d;
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .timeline::before {
        left: 0;
    }

    .timeline-dot {
        left: 0;
        margin-left: -8px;
    }

    .timeline-content {
        width: calc(100% - 30px);
        margin-left: 30px;
    }

    .timeline-item:nth-child(odd) .timeline-content {
        margin-left: 30px;
    }
}

.announcement-item, .article-item {
    padding-bottom: 1.5rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid #e9ecef;
}

.announcement-item:last-child, .article-item:last-child {
    padding-bottom: 0;
    margin-bottom: 0;
    border-bottom: none;
}

.btn-link {
    text-decoration: none;
}

.btn-link:hover {
    text-decoration: underline;
}

</style>
@endpush

@endsection
