@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Edit Pengumuman</h5>
        <div class="card-body">
            <form action="{{ route('announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="title" class="form-label">Judul Pengumuman</label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $announcement->title) }}" 
                               required>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="content" class="form-label">Konten Pengumuman</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="editor" 
                                  name="content" 
                                  rows="6" 
                                  required>{{ old('content', $announcement->content) }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="draft" {{ (old('status', $announcement->status) == 'draft') ? 'selected' : '' }}>Draft</option>
                            <option value="publish" {{ (old('status', $announcement->status) == 'publish') ? 'selected' : '' }}>Publish</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        @if($announcement->thumbnail)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $announcement->thumbnail) }}" 
                                     alt="Current Thumbnail" 
                                     class="img-thumbnail" 
                                     style="max-height: 200px">
                            </div>
                        @endif
                        <input type="file" 
                               class="form-control @error('thumbnail') is-invalid @enderror" 
                               id="thumbnail" 
                               name="thumbnail"
                               accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah thumbnail</small>
                        @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('announcements.index') }}" class="btn btn-secondary me-1">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
