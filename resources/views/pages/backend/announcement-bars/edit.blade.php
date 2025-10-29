@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Edit Announcement Bar</h5>
        <div class="card-body">
            <form action="{{ route('announcement-bars.update', $announcementBar->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="text" class="form-label">Text Announcement</label>
                        <textarea class="form-control @error('text') is-invalid @enderror"
                                  id="text"
                                  name="text"
                                  rows="3"
                                  required>{{ old('text', $announcementBar->text) }}</textarea>
                        @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="is_active" class="form-label">Status</label>
                        <select class="form-control @error('is_active') is-invalid @enderror"
                                id="is_active"
                                name="is_active"
                                required>
                            <option value="1" {{ old('is_active', $announcementBar->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $announcementBar->is_active) == '0' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('is_active')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="order" class="form-label">Urutan</label>
                        <input type="number"
                               class="form-control @error('order') is-invalid @enderror"
                               id="order"
                               name="order"
                               value="{{ old('order', $announcementBar->order) }}"
                               min="0"
                               required>
                        @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('announcement-bars.index') }}" class="btn btn-secondary me-1">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

