<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Kategori Barang',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Data Kategori Barang'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        $kategori = KategoriModel::all();

        return view('kategori.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'kategori'       => $kategori,
            'activeMenu' => $activeMenu
        ]);
    } 

    public function list(Request $request)
    {
        $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        if ($request->kategori_id) {
            $kategori->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($item) {
                $btn  = '<a href="' . url('/kategori/' . $item->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategori/' . $item->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $item->kategori_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>
                </form>';

                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);

    }

}
