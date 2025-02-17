@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="card-title">Detail Alat</h5>
      <div>
        <a href="{{ route('tools.edit', $tool->id) }}" class="btn btn-warning btn-sm">
          <i class='bx bx-edit'></i> Edit
        </a>
        <a href="{{ route('tools.index') }}" class="btn btn-secondary btn-sm">
          <i class='bx bx-arrow-back'></i> Kembali
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <table class="table table-borderless">
            <tr>
              <th width="30%">Nama Alat</th>
              <td>: {{ $tool->name }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>: <span class="badge bg-{{ $tool->status === 'publish' ? 'success' : 'secondary' }}">
                {{ $tool->status === 'publish' ? 'Publish' : 'Draft' }}
              </span></td>
            </tr>
            <tr>
              <th>Dibuat Oleh</th>
              <td>: {{ $tool->user->name }}</td>
            </tr>
            <tr>
              <th>Tanggal Dibuat</th>
              <td>: {{ $tool->created_at->format('d M Y H:i') }}</td>
            </tr>
            <tr>
              <th>Terakhir Diupdate</th>
              <td>: {{ $tool->updated_at->format('d M Y H:i') }}</td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 mt-3 description-section">
          <h6>Deskripsi:</h6>
          <p class="text-justify">{!! $tool->description !!}</p>
        </div>
      </div>

      <!-- Image Gallery -->
      <div class="mt-4">
        <h6>Foto Alat:</h6>
        @if($tool->toolImages->count() > 0)
          <div class="swiper tool-swiper">
            <div class="swiper-wrapper">
              @foreach($tool->toolImages as $image)
              <div class="swiper-slide">
                <img src="{{ asset('storage/' . $image->image) }}" 
                     alt="Tool Image" 
                     class="img-fluid rounded">
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        @else
          <p class="text-muted">Tidak ada foto</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<style>
.tool-swiper {
    width: 100%;
    padding-bottom: 50px;
}
.tool-swiper .swiper-slide {
    text-align: center;
}
.tool-swiper img {
    max-height: 400px;
    width: auto;
}
.description-section {
    padding: 20px;
    border-radius: 5px;
    margin-top: 20px;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.tool-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
</script>
@endpush
