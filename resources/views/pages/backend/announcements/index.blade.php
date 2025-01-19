@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('announcements.create') }}" class="btn btn-primary btn-sm">Buat Pengumuman</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Pengumuman</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Judul</th>
            <th class="text-white">Konten</th>
            <th class="text-white">Status</th>
            <th class="text-white">Dibuat Oleh</th>
            <th class="text-white">Tanggal</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($announcements as $announcement)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $announcement->title }}</td>
            <td>{!! Str::words(strip_tags($announcement->content), 5) !!}</td>
            <td>
              <span class="badge bg-{{ $announcement->status === 'publish' ? 'success' : 'secondary' }}">
                {{ $announcement->status === 'publish' ? 'Publish' : 'Draft' }}
              </span>
            </td>
            <td>{{ $announcement->user->name }}</td>
            <td>{{ $announcement->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-info btn-sm">Show</a>
              <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">Delete</button>
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