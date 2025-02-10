@extends('layouts.frontend.main')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <i class='bx bx-download text-primary display-4 me-3'></i>
                        <h3 class="mb-0">Download File</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="downloadTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($downloads as $download)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $download->title }}</td>
                                    <td>{{ $download->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $download->file) }}" 
                                           class="btn btn-primary btn-sm"
                                           target="_blank">
                                            <i class='bx bx-download me-1'></i> Download
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#downloadTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
@endsection
