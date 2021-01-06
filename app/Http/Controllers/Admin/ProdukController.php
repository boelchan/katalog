<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProdukController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $pageConfigs = ['showMenu' => true ];

        $produks = Produk::orderby('id', 'desc')->paginate(10);        
        return view('admin/produk/index', compact('produks', 'pageConfigs'));
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show',compact('produk'));
    }
    
    public function create()
    {
        $kategoris = Kategori::pluck('nama', 'id')->all();
        return view('admin.produk.create', compact('kategoris'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama'        => 'required',
            'harga'       => 'required',
            'tampil'      => 'required',
        ]);

        $produk = new Produk;

        if ( $request->image)
        {
            $sub_folder = Kategori::find($request->kategori_id)->nama_seo;
            $nama_file = $this->proses_upload( $request->file('image'), $sub_folder);
            $produk->image = $nama_file;
        }

        $produk->kategori_id = $request->kategori_id;
        $produk->nama        = $request->nama;
        $produk->deskripsi   = $request->deskripsi;
        $produk->harga       = $request->harga;
        $produk->tampil      = $request->tampil;
        $produk->save();
    
        return redirect()->route('produk.index')
                        ->with('success','Produk created successfully.');
    }
     
     
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::pluck('nama', 'id')->all();
        return view('admin.produk.edit',compact('produk', 'kategoris'));
    }
    
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama'        => 'required',
            'harga'       => 'required',
            'tampil'      => 'required',
        ]);
        
        if ( $request->image)
        {
            $sub_folder = Kategori::find($request->kategori_id)->nama_seo;
            $nama_file = $this->proses_upload( $request->file('image'), $sub_folder);
            $produk->image = $nama_file;
        }
        
        $produk->kategori_id = $request->kategori_id;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->tampil = $request->tampil;
        
        $produk->save();
    
        return redirect()->route('produk.index')
                        ->with('success','Produk updated successfully');
    }
    
    public function destroy(Produk $produk)
    {
        $produk->delete();
    
        return redirect()->route('produk.index')
                        ->with('success','Produk berhasil dihapus');
    }

    public function proses_upload($file, $tujuan)
    {
        // isi dengan nama folder tempat kemana file diupload
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'uploads/'.$tujuan;
        $file->move($tujuan_upload, $nama_file);
        
        
        // $nama_file = $tujuan.'_'.time().'_'.uniqid().'.'.$file->extension();
        // $file->storeAs($tujuan,  $nama_file, ['disk' => 'public']);
        return $nama_file;
	}
    
    
}
