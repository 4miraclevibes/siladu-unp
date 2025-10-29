@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="card">
    <div class="card-header">
      <a href="{{ route('timelines.create') }}" class="btn btn-primary btn-sm">Buat Timeline</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Timeline</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Gambar</th>
            <th class="text-white">Tahun</th>
            <th class="text-white">Judul</th>
            <th class="text-white">Warna</th>
            <th class="text-white">Status</th>
            <th class="text-white">Order</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($timelines as $timeline)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              @if($timeline->image)
              <img src="{{ asset('storage/' . $timeline->image) }}" alt="Timeline" style="max-width: 80px; height: auto;">
              @else
              <span class="text-muted">-</span>
              @endif
            </td>
            <td><strong>{{ $timeline->year }}</strong></td>
            <td>{{ $timeline->title }}</td>
            <td>
              <span class="badge bg-{{ $timeline->color }}">{{ ucfirst($timeline->color) }}</span>
            </td>
            <td>
              <span class="badge bg-{{ $timeline->is_active ? 'success' : 'secondary' }}">
                {{ $timeline->is_active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>
            <td>{{ $timeline->order }}</td>
            <td>
              <a href="{{ route('timelines.edit', $timeline->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('timelines.destroy', $timeline->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus timeline ini?')">Delete</button>
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
