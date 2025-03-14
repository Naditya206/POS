<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    // Menampilkan halaman daftar barang
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list'  => ['Home', 'Barang']
        ];

        $page = (object) [
            'title' => 'Daftar barang yang tersedia dalam sistem'
        ];

        $kategori = KategoriModel::all();
        $activeMenu = 'barang'; // set menu yang sedang aktif

        return view('barang.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Ambil data barang untuk DataTables (JSON)
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangModel::with('kategori')->select([
                'barang_id',
                'barang_kode',
                'barang_nama',
                'kategori_id',
                'harga_beli',
                'harga_jual'
            ]);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori_nama', function($row){
                    return $row->kategori ? $row->kategori->kategori_nama : '-';
                })
                ->addColumn('aksi', function($row){
                    $editUrl = url('barang/edit/'.$row->barang_id);
                    $deleteUrl = url('barang/delete/'.$row->barang_id);

                    return '
                        <a href="'.$editUrl.'" class="btn btn-sm btn-warning">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;">
                            '.csrf_field().method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\')">Hapus</button>
                        </form>
                    ';
                })
                ->rawColumns(['aksi']) // Supaya tombol aksi bisa tampil sebagai HTML
                ->make(true);
        }
    }

    // Menampilkan form tambah barang
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list'  => ['Home', 'Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah barang baru'
        ];

        $kategori = KategoriModel::all();
        $activeMenu = 'barang';

        return view('barang.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'  => 'required|string|min:3|unique:m_barang,kode_barang',
            'nama_barang'  => 'required|string|max:100',
            'kategori_id'  => 'required|integer',
            'harga'        => 'required|numeric|min:0'
        ]);

        BarangModel::create([
            'kode_barang'  => $request->kode_barang,
            'nama_barang'  => $request->nama_barang,
            'kategori_id'  => $request->kategori_id,
            'harga'        => $request->harga
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    // Menampilkan detail barang
    public function show(string $id)
    {
        $barang = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list'  => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail barang'
        ];

        $activeMenu = 'barang';

        return view('barang.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'barang'     => $barang,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan form edit barang
    public function edit(string $id)
    {
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list'  => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'barang'     => $barang,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan barang
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang'  => 'required|string|min:3|unique:m_barang,kode_barang,' . $id . ',barang_id',
            'nama_barang'  => 'required|string|max:100',
            'kategori_id'  => 'required|integer',
            'harga'        => 'required|numeric|min:0'
        ]);

        BarangModel::find($id)->update([
            'kode_barang'  => $request->kode_barang,
            'nama_barang'  => $request->nama_barang,
            'kategori_id'  => $request->kategori_id,
            'harga'        => $request->harga
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    // Menghapus barang
    public function destroy(string $id)
    {
        $check = BarangModel::find($id);

        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            BarangModel::destroy($id);

            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terkait dengan data lain');
        }
    }
}
