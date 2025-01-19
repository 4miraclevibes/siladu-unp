@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createToolModal">
        Buat Alat
      </button>
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
            <td>{{ Str::limit($tool->description, 50) }}</td>
            <td>
              <span class="badge bg-{{ $tool->status === 'publish' ? 'success' : 'secondary' }}">
                {{ $tool->status === 'publish' ? 'Publish' : 'Draft' }}
              </span>
            </td>
            <td>{{ $tool->toolImages->count() }} foto</td>
            <td>{{ $tool->user->name }}</td>
            <td>{{ $tool->created_at->format('d M Y') }}</td>
            <td>
              <button type="button" 
                      class="btn btn-info btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#showToolModal{{ $tool->id }}">
                <i class='bx bx-show'></i>
              </button>
              <button type="button" 
                      class="btn btn-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#editToolModal{{ $tool->id }}">
                <i class='bx bx-edit'></i>
              </button>
              <form action="{{ route('tools.destroy', $tool->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">
                  <i class='bx bx-trash'></i>
                </button>
              </form>
            </td>
          </tr>

          <!-- Show Tool Modal -->
          <div class="modal fade" id="showToolModal{{ $tool->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ $tool->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <p>{{ $tool->description }}</p>
                  <div class="swiper tool-swiper mt-4">
                    <div class="swiper-wrapper">
                      @foreach($tool->toolImages as $image)
                      <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $image->image) }}" 
                             class="img-fluid rounded" 
                             alt="Tool Image">
                      </div>
                      @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Tool Modal -->
          <div class="modal fade" id="editToolModal{{ $tool->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('tools.update', $tool->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Alat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nama Alat</label>
                      <input type="text" 
                             class="form-control @error('name') is-invalid @enderror" 
                             name="name" 
                             value="{{ old('name', $tool->name) }}" 
                             required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Deskripsi</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" 
                                name="description" 
                                rows="4" 
                                required>{{ old('description', $tool->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option value="draft" {{ $tool->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ $tool->status == 'publish' ? 'selected' : '' }}>Publish</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Tambah Foto</label>
                      <input type="file" 
                             class="form-control @error('images') is-invalid @enderror" 
                             name="images[]" 
                             accept="image/*" 
                             multiple>
                      <small class="text-muted">Bisa pilih lebih dari satu foto</small>
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

<!-- Create Tool Modal -->
<div class="modal fade" id="createToolModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('tools.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Buat Alat Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Alat</label>
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
            <label class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status" required>
              <option value="draft">Draft</option>
              <option value="publish">Publish</option>
            </select>
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
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Alat</button>
        </div>
      </form>
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