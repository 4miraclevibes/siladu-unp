@extends('layouts.backend.main')

@section('title', 'Edit Timeline')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Timelines /</span> Edit
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Edit Timeline</h5>
            <a href="{{ route('timelines.index') }}" class="btn btn-secondary">
                <i class='bx bx-arrow-back'></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('timelines.update', $timeline) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="year" class="form-label">Tahun <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('year') is-invalid @enderror"
                           id="year" name="year" value="{{ old('year', $timeline->year) }}"
                           placeholder="Contoh: 2017">
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title', $timeline->title) }}"
                           placeholder="Contoh: Pendirian UPT Laboratorium Terpadu UNP">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description" name="description" rows="3"
                              placeholder="Masukkan deskripsi timeline">{{ old('description', $timeline->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    @if($timeline->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $timeline->image) }}"
                                 alt="Current Image"
                                 class="img-thumbnail"
                                 style="max-width: 200px;">
                            <p class="text-muted mt-1">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                           id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Warna <span class="text-danger">*</span></label>
                    <select class="form-select @error('color') is-invalid @enderror" id="color" name="color">
                        <option value="primary" {{ old('color', $timeline->color) == 'primary' ? 'selected' : '' }}>Primary (Biru)</option>
                        <option value="success" {{ old('color', $timeline->color) == 'success' ? 'selected' : '' }}>Success (Hijau)</option>
                        <option value="info" {{ old('color', $timeline->color) == 'info' ? 'selected' : '' }}>Info (Cyan)</option>
                        <option value="warning" {{ old('color', $timeline->color) == 'warning' ? 'selected' : '' }}>Warning (Kuning)</option>
                        <option value="danger" {{ old('color', $timeline->color) == 'danger' ? 'selected' : '' }}>Danger (Merah)</option>
                    </select>
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Urutan <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                           id="order" name="order" value="{{ old('order', $timeline->order) }}"
                           placeholder="0">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Semakin kecil angka, semakin atas urutannya</small>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                               {{ old('is_active', $timeline->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Aktifkan Timeline
                        </label>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class='bx bx-save'></i> Update
                    </button>
                    <a href="{{ route('timelines.index') }}" class="btn btn-secondary">
                        <i class='bx bx-x'></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

