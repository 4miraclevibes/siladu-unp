@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
        Buat Proyek
      </a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Proyek</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Deskripsi</th>
            <th class="text-white">Gambar</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $project->name }}</td>
            <td>{{ Str::limit($project->description, 50) }}</td>
            <td>
              <img src="{{ asset('storage/' . $project->image) }}" 
                   alt="Project Image" 
                   style="max-height: 50px;">
            </td>
            <td>
              <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">
                <i class='bx bx-show'></i>
              </a>
              <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">
                <i class='bx bx-edit'></i>
              </a>
              <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">
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