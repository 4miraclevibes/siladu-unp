@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createProjectModal">
        Buat Proyek
      </button>
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
              <button type="button" 
                      class="btn btn-info btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#showProjectModal{{ $project->id }}">
                <i class='bx bx-show'></i>
              </button>
              <button type="button" 
                      class="btn btn-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#editProjectModal{{ $project->id }}">
                <i class='bx bx-edit'></i>
              </button>
              <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">
                  <i class='bx bx-trash'></i>
                </button>
              </form>
            </td>
          </tr>

          <!-- Show Project Modal -->
          <div class="modal fade" id="showProjectModal{{ $project->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ $project->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $project->image) }}" 
                         class="img-fluid rounded" 
                         alt="Project Image"
                         style="max-height: 400px; width: auto;">
                  </div>
                  <div class="description-container" style="max-height: 300px; overflow-y: auto;">
                    <p class="text-justify" style="white-space: pre-line;">{{ $project->description }}</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Project Modal -->
          <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Proyek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nama Proyek</label>
                      <input type="text" 
                             class="form-control @error('name') is-invalid @enderror" 
                             name="name" 
                             value="{{ old('name', $project->name) }}" 
                             required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Deskripsi</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" 
                                name="description" 
                                rows="4" 
                                required>{{ old('description', $project->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar</label>
                      <input type="file" 
                             class="form-control @error('image') is-invalid @enderror" 
                             name="image" 
                             accept="image/*">
                      <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Create Project Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Buat Proyek Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Proyek</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      name="description" 
                      rows="4" 
                      required>{{ old('description') }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Upload Gambar</label>
            <input type="file" 
                   class="form-control @error('image') is-invalid @enderror" 
                   name="image" 
                   accept="image/*" 
                   required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Proyek</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection