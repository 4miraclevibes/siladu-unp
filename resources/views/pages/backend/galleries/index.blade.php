@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createGalleryModal">
        Buat Galeri
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Galeri</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Judul</th>
            <th class="text-white">Konten</th>
            <th class="text-white">Status</th>
            <th class="text-white">Jumlah Foto</th>
            <th class="text-white">Dibuat Oleh</th>
            <th class="text-white">Tanggal</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($galleries as $gallery)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $gallery->title }}</td>
            <td>{{ Str::limit($gallery->content, 50) }}</td>
            <td>
              <span class="badge bg-{{ $gallery->status === 'publish' ? 'success' : 'secondary' }}">
                {{ $gallery->status === 'publish' ? 'Publish' : 'Draft' }}
              </span>
            </td>
            <td>{{ $gallery->galleryDetails->count() }} foto</td>
            <td>{{ $gallery->user->name }}</td>
            <td>{{ $gallery->created_at->format('d M Y') }}</td>
            <td>
              <button type="button" 
                      class="btn btn-info btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#showGalleryModal{{ $gallery->id }}">
                <i class='bx bx-show'></i>
              </button>
              <button type="button" 
                      class="btn btn-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#editGalleryModal{{ $gallery->id }}">
                <i class='bx bx-edit'></i>
              </button>
              <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
                  <i class='bx bx-trash'></i>
                </button>
              </form>
            </td>
          </tr>

          <!-- Show Gallery Modal -->
          <div class="modal fade" id="showGalleryModal{{ $gallery->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ $gallery->title }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <p>{{ $gallery->content }}</p>
                  <div class="swiper gallery-swiper mt-4">
                    <div class="swiper-wrapper">
                      @foreach($gallery->galleryDetails as $detail)
                      <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $detail->image) }}" 
                             class="img-fluid rounded" 
                             alt="Gallery Image">
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

          <!-- Edit Gallery Modal -->
          <div class="modal fade" id="editGalleryModal{{ $gallery->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Judul Galeri</label>
                      <input type="text" 
                             class="form-control @error('title') is-invalid @enderror" 
                             name="title" 
                             value="{{ old('title', $gallery->title) }}" 
                             required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Konten</label>
                      <textarea class="form-control @error('content') is-invalid @enderror" 
                                name="content" 
                                rows="4" 
                                required>{{ old('content', $gallery->content) }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option value="draft" {{ $gallery->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ $gallery->status == 'publish' ? 'selected' : '' }}>Publish</option>
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
                      @foreach($gallery->galleryDetails as $detail)
                      <div class="col-4">
                        <div class="position-relative">
                          <img src="{{ asset('storage/' . $detail->image) }}" 
                               class="img-thumbnail" 
                               alt="Gallery Image">
                          <button type="button" 
                                  class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                  onclick="deleteImage({{ $detail->id }})">
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

<!-- Create Gallery Modal -->
<div class="modal fade" id="createGalleryModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Buat Galeri Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul Galeri</label>
            <input type="text" 
                   class="form-control @error('title') is-invalid @enderror" 
                   name="title" 
                   value="{{ old('title') }}" 
                   required>
          </div>
          <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea class="form-control @error('content') is-invalid @enderror" 
                      name="content" 
                      rows="4" 
                      required>{{ old('content') }}</textarea>
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
          <button type="submit" class="btn btn-primary">Simpan Galeri</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<style>
.gallery-swiper {
    width: 100%;
    padding-bottom: 50px;
}
.gallery-swiper .swiper-slide {
    text-align: center;
}
.gallery-swiper img {
    max-height: 400px;
    width: auto;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize all Swiper instances
    document.querySelectorAll('.gallery-swiper').forEach(function(element) {
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
        fetch(`/gallery-details/${id}`, {
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