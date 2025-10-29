@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('hero-carousels.create') }}" class="btn btn-primary btn-sm">Buat Hero Carousel</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Hero Carousel</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Gambar</th>
            <th class="text-white">Judul</th>
            <th class="text-white">Subtitle</th>
            <th class="text-white">Status</th>
            <th class="text-white">Order</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($heroCarousels as $carousel)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              <img src="{{ asset('storage/' . $carousel->image) }}" alt="Carousel" style="max-width: 100px; height: auto;">
            </td>
            <td>{{ $carousel->title }}</td>
            <td>{{ $carousel->subtitle ?? '-' }}</td>
            <td>
              <span class="badge bg-{{ $carousel->is_active ? 'success' : 'secondary' }}">
                {{ $carousel->is_active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>
            <td>{{ $carousel->order }}</td>
            <td>
              <a href="{{ route('hero-carousels.edit', $carousel->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('hero-carousels.destroy', $carousel->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus hero carousel ini?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection

