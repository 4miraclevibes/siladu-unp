@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('tools.create') }}" class="btn btn-primary btn-sm">
        Buat Alat
      </a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Alat</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Deskripsi</th>
            <th class="text-white">Status</th>
            <th class="text-white">Jumlah Foto</th>
            <th class="text-white">Dibuat Oleh</th>
            <th class="text-white">Tanggal</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tools as $tool)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $tool->name }}</td>
            <td>{!! Str::words(strip_tags($tool->description), 5) !!}</td>
            <td>
              <span class="badge bg-{{ $tool->status === 'publish' ? 'success' : 'secondary' }}">
                {{ $tool->status === 'publish' ? 'Publish' : 'Draft' }}
              </span>
            </td>
            <td>{{ $tool->toolImages->count() }} foto</td>
            <td>{{ $tool->user->name }}</td>
            <td>{{ $tool->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('tools.show', $tool->id) }}" 
                 class="btn btn-info btn-sm">
                <i class='bx bx-show'></i>
              </a>
              <a href="{{ route('tools.edit', $tool->id) }}" 
                 class="btn btn-warning btn-sm">
                <i class='bx bx-edit'></i>
              </a>
              <form action="{{ route('tools.destroy', $tool->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">
                  <i class='bx bx-trash'></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
$(document).ready(function() {
    document.querySelectorAll('.tool-swiper').forEach(function(element) {
        new Swiper(element, {
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
});

function deleteImage(id) {
    if(confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
        fetch(`/tool-images/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        }).then(response => {
            if(response.ok) {
                location.reload();
            }
        });
    }
}
</script>
@endpush