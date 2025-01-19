@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Buat Artikel Baru</h5>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
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
                        <label for="content" class="form-label">Konten Artikel</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="editor" 
                                  name="content" 
                                  rows="6" >{{ old('content') }}</textarea>
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
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('articles.index') }}" class="btn btn-secondary me-1">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection