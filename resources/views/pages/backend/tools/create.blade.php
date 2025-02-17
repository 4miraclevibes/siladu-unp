@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Buat Alat Baru</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('tools.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Alat</label>
          <input type="text" 
                 class="form-control @error('name') is-invalid @enderror" 
                 name="name" 
                 value="{{ old('name') }}" 
                 required>
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea class="form-control @error('description') is-invalid @enderror" 
                    name="description" 
                    rows="4"
                    id="editor" 
                    >{{ old('description') }}</textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select @error('status') is-invalid @enderror" name="status" required>
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
          </select>
          @error('status')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Upload Foto</label>
          <input type="file" 
                 class="form-control @error('images') is-invalid @enderror" 
                 name="images[]" 
                 accept="image/*" 
                 multiple 
                 required>
          <small class="text-muted">Bisa pilih lebih dari satu foto</small>
          @error('images')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mt-3">
          <a href="{{ route('tools.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan Alat</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
