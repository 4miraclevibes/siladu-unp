@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Pesan Kontak</h5>
      <span class="badge bg-primary">{{ $contacts->where('status', 'unread')->count() }} Belum Dibaca</span>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Semua Pesan</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Email</th>
            <th class="text-white">Pesan</th>
            <th class="text-white">Status</th>
            <th class="text-white">Tanggal</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
          <tr class="{{ $contact->status === 'unread' ? 'table-warning' : '' }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{!! Str::words($contact->message, 8) !!}</td>
            <td>
              @if($contact->status === 'unread')
                <span class="badge bg-warning">Belum Dibaca</span>
              @else
                <span class="badge bg-success">Sudah Dibaca</span>
              @endif
            </td>
            <td>{{ $contact->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Detail</a>
              <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Delete</button>
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

