@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">Buat Artikel</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Artikel</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Judul</th>
            <th class="text-white">Konten</th>
            <th class="text-white">Status</th>
            <th class="text-white">Dibuat Oleh</th>
            <th class="text-white">Tanggal</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($articles as $article)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $article->title }}</td>
            <td>{!! Str::words(strip_tags($article->content), 5) !!}</td>
            <td>
              <span class="badge bg-{{ $article->status === 'publish' ? 'success' : 'secondary' }}">
                {{ $article->status === 'publish' ? 'Publish' : 'Draft' }}
              </span>
            </td>
            <td>{{ $article->user->name }}</td>
            <td>{{ $article->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">Show</a>
              <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection