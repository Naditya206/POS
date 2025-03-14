@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Kode Level</th>
                    <th>Nama Level</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
<!-- Tambah CSS custom kalau perlu -->
@endpush

@push('js')
<script>
$(document).ready(function() {
    var dataLevel = $('#table_level').DataTable({
        serverSide: true,
        processing: true,

        ajax: {
            url: "{{ route('level.list') }}",
            dataType: "json",
            type: "POST",
            data: function (d) {
                d._token = "{{ csrf_token() }}";
            }
        },


        columns: [
            {
                data: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'level_id',
                className: '',
                orderable: true,
                searchable: true
            },
            {
                data: 'level_kode',
                className: '',
                orderable: true,
                searchable: true
            },
            {
                data: 'level_nama',
                className: '',
                orderable: true,
                searchable: true
            }
        ]
    });
});
</script>
@endpush
