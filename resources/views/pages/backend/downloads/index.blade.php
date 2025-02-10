@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createDownloadModal">
        Tambah File
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar File Download</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Judul</th>
            <th class="text-white">File</th>
            <th class="text-white">Tanggal Upload</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($downloads as $download)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $download->title }}</td>
            <td>
              <a href="{{ asset('storage/' . $download->file) }}" class="btn btn-sm btn-primary" target="_blank">
                <i class='bx bx-download'></i> Download
              </a>
            </td>
            <td>{{ $download->created_at->format('d M Y') }}</td>
            <td>
              <button type="button" 
                      class="btn btn-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#editDownloadModal{{ $download->id }}">
                <i class='bx bx-edit'></i>
              </button>
              <form action="{{ route('downloads.destroy', $download->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                  <i class='bx bx-trash'></i>
                </button>
              </form>
            </td>
          </tr>

          <!-- Edit Download Modal -->
          <div class="modal fade" id="editDownloadModal{{ $download->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Judul File</label>
                      <input type="text" 
                             class="form-control @error('title') is-invalid @enderror" 
                             name="title" 
                             value="{{ old('title', $download->title) }}" 
                             required>
                      @error('title')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">File</label>
                      <input type="file" 
                             class="form-control @error('file') is-invalid @enderror" 
                             name="file">
                      @error('file')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>
                      @if($download->file)
                      <div class="mt-2">
                        <small>File saat ini: <a href="{{ asset('storage/' . $download->file) }}" target="_blank">{{ basename($download->file) }}</a></small>
                      </div>
                      @endif
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

<!-- Create Download Modal -->
<div class="modal fade" id="createDownloadModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('downloads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah File Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul File</label>
            <input type="text" 
                   class="form-control @error('title') is-invalid @enderror" 
                   name="title" 
                   value="{{ old('title') }}" 
                   required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Upload File</label>
            <input type="file" 
                   class="form-control @error('file') is-invalid @enderror" 
                   name="file" 
                   required>
            @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan File</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endpush