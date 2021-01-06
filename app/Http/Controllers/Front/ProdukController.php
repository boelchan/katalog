<?php

namespace App\Http\Controllers\Front;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\LogPengunjung;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function __construct()
    {
        $log1 = LogPengunjung::first();
        $log1->jumlah = $log1->jumlah + 1;
        $log1->save();

    }

    public function katalog(Request $request)
    {
        $pageConfigs = [
            'bodyClass' => 'ecommerce-application',
            'showMenu' => false,
            'contentLayout' => "content-detached-left-sidebar",
          ];

        $logPengunjung = LogPengunjung::pluck('jumlah')->first();

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
        $pageConfigs = [
            'bodyClass' => 'ecommerce-application',
            'showMenu' => false,
            // 'contentLayout' => "content-detached-left-sidebar",
          ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => "Detail"]
          ];
      
        if ( $id )
        {
            $produk = Produk::find($id);
            return view('/front/produk/details', compact('produk', 'breadcrumbs'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function list()
    {
        $produks   = Produk::orderBy('id', 'desc')->paginate(10);

        return view('admin/list', compact('produks'));
    }


    public function edit($id='')
    {

        return view('admin/list');
    }
}
