@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">
                Tambah
            </a>
        </div>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 col-form-label">Filter:</label>
                    <div class="col-3">
                        <select id="level_id" name="level_id" class="form-control">
                            <option value="">- Semua -</option>
                            @foreach($level as $item)
                                <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Level Penggun</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>    
</div>
@endsection

@push('css')
<!-- Tambahkan custom CSS di sini jika diperlukan -->
@endpush

@push('js')
<script>
$(document).ready(function() {
    var dataUser = $('#table_user').DataTable({
        // Aktifkan server-side processing
        serverSide: true,

        // Konfigurasi ajax untuk mengambil data user
        ajax: {
            url: "{{ url('user/list') }}",
            dataType: "json",
            type: "POST",
            "data": function (d) {
                d.level_id = $('#level_id').val();
            }
        },

        // Definisikan kolom-kolom tabel
        columns: [
            {
                // Kolom index (nomor urut)
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                // Kolom username
                data: "username",
                className: "",
                orderable: true,
                searchable: true
            },
            {
                // Kolom nama user
                data: "nama",
                className: "",
                orderable: true,
                searchable: true
            },
            {
                // Kolom level user (relasi dari tabel level)
                data: "level.level_nama",
                className: "",
                orderable: false,
                searchable: false
            },
            {
                // Kolom aksi (edit, hapus, dll)
                data: "aksi",
                className: "",
                orderable: false,
                searchable: false
            }
        ]
    });
    $('#level_id').on('change', function() {
        dataUser.ajax.reload();
    })
});
</script>
@endpush