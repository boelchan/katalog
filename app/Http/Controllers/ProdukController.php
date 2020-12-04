<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function katalog()
    {
        $pageConfigs = [
            'contentLayout' => "content-detached-left-sidebar",
          ];

        $kategoris = Kategori::all();
        $produks   = Produk::paginate(10);

        return view('/front/produk/katalog', compact('kategoris', 'produks', 'pageConfigs'));
    }

    public function detail($id='')
    {
 
      
        if ( $id )
        {
            $produk = Produk::find($id);
            return view('/front/produk/details', compact('produk'));
        }
        else
        {
            return redirect('/');
        }
    }
}
