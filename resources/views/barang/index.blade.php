@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">
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
                        <select id="kategori_id" name="kategori_id" class="form-control">
                            <option value="">- Semua -</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori Barang</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
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
    var dataBarang = $('#table_barang').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('barang/list') }}",
            type: "POST",
            dataType: "json",
            data: function (d) {
                d._token = "{{ csrf_token() }}"; // jangan lupa kalau pakai POST di Laravel
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', className: "text-center", orderable: false, searchable: false },
            { data: 'barang_kode', name: 'barang_kode' },
            { data: 'barang_nama', name: 'barang_nama' },
            { data: 'kategori_nama', name: 'kategori.kategori_nama' },
            { data: 'harga_beli', name: 'harga_beli' },
            { data: 'harga_jual', name: 'harga_jual' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
