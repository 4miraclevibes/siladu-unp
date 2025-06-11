@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Edit Alat</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('tools.update', $tool->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nama Alat</label>
          <input type="text"
                 class="form-control @error('name') is-invalid @enderror"
                 name="name"
                 value="{{ old('name', $tool->name) }}"
                 required>
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    id="editor"
                    rows="4"
                    >{{ old('description', $tool->description) }}</textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select @error('status') is-invalid @enderror" name="status" required>
            <option value="draft" {{ $tool->status == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="publish" {{ $tool->status == 'publish' ? 'selected' : '' }}>Publish</option>
          </select>
          @error('status')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Tambah Foto</label>
          <input type="file"
                 class="form-control @error('images') is-invalid @enderror"
                 name="images[]"
                 accept="image/*"
                 multiple>
          <small class="text-muted">Bisa pilih lebih dari satu foto</small>
          @error('images')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Existing Images -->
        <div class="row g-2 mt-2">
          @foreach($tool->toolImages as $image)
          <div class="col-4">
            <div class="position-relative">
              <img src="{{ asset('storage/' . $image->image) }}"
                   class="img-thumbnail"
                   alt="Tool Image">
              <button type="button"
                      class="btn btn-danger btn-sm position-absolute top-0 end-0"
                      onclick="deleteImage({{ $image->id }})">
                <i class='bx bx-x'></i>
              </button>
            </div>
          </div>
          @endforeach
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Perubahan</label>
          <input type="datetime-local"
                 class="form-control @error('updated_at') is-invalid @enderror"
                 name="updated_at"
                 value="{{ old('updated_at', $tool->updated_at) }}">
        </div>
        <div class="mt-3">
          <a href="{{ route('tools.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
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
