@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('announcement-bars.create') }}" class="btn btn-primary btn-sm">Buat Announcement Bar</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Announcement Bar</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Text</th>
            <th class="text-white">Status</th>
            <th class="text-white">Order</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($announcementBars as $bar)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{!! Str::words($bar->text, 15) !!}</td>
            <td>
              <span class="badge bg-{{ $bar->is_active ? 'success' : 'secondary' }}">
                {{ $bar->is_active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>
            <td>{{ $bar->order }}</td>
            <td>
              <a href="{{ route('announcement-bars.edit', $bar->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('announcement-bars.destroy', $bar->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus announcement bar ini?')">Delete</button>
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

