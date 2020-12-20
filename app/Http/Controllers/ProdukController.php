<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\LogPengunjung;

class ProdukController extends Controller
{
    public $logPengunjung;
    public function __construct()
    {
        $log1 = LogPengunjung::first();
        $log1->jumlah = $log1->jumlah + 1;
        $log1->save();
        $this->logPengunjung = LogPengunjung::pluck('jumlah')->first();

    }

    public function katalog(Request $request)
    {
        $logPengunjung = $this->logPengunjung;

        $pageConfigs = [
            'contentLayout' => "content-detached-left-sidebar",
          ];
          $breadcrumbs = [
            ['name' => "Home"]
          ];

        $filter_kategori =  $request->post('kat');
        
        $where = [];
        if ( isset($filter_kategori) )
        {
            $where['kategori_id'] = $filter_kategori;
        }
        

        $kategoris = Kategori::all();
        $produks   = Produk::where($where)->orderBy('id', 'desc')->paginate(12);

        return view('/front/produk/katalog', compact('kategoris', 'produks', 'pageConfigs', 'breadcrumbs', 'request', 'logPengunjung'));
    }

    public function detail($id='')
    {
        $logPengunjung = $this->logPengunjung;
 
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => "Detail"]
          ];
      
        if ( $id )
        {
            $produk = Produk::find($id);
            return view('/front/produk/details', compact('produk', 'breadcrumbs', 'logPengunjung'));
        }
        else
        {
            return redirect('/');
        }
    }
}
