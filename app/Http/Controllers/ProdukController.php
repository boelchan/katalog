<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function katalog(Request $request)
    {
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
        $produks   = Produk::where($where)->paginate(10);

        return view('/front/produk/katalog', compact('kategoris', 'produks', 'pageConfigs', 'breadcrumbs', 'request'));
    }

    public function detail($id='')
    {
 
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
}
