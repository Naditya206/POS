@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create') }}">
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

        <!-- Ini tabel kategori -->
        <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
        </table>
    </div>    
</div>
@endsection

@push('css')
<!-- Custom CSS di sini kalau butuh -->
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#table_kategori').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('kategori/list') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                }
            },
            columns: [
                { 
                    data: "DT_RowIndex", 
                    name: "DT_RowIndex", 
                    className: "text-center", 
                    orderable: false, 
                    searchable: false 
                },
                { data: "kategori_kode", name: "kategori_kode" },
                { data: "kategori_nama", name: "kategori_nama" }
            ],
            order: [[1, 'asc']]
        });
    });
</script>
@endpush
