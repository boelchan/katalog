<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function list()
    {
      $pageConfigs = [
        'contentLayout' => "content-detached-left-sidebar",
        'pageClass' => 'ecommerce-application',
      ];
  
      $breadcrumbs = [
        ['link' => "/", 'name' => "Home"], ['name' => "Shop"]
      ];
  
      return view('/produk/list', [
        'pageConfigs' => $pageConfigs,
        'breadcrumbs' => $breadcrumbs
      ]);
    }
}
