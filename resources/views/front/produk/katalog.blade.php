@extends('front/base/detachedLayoutMaster')

@section('title', 'Shop')

@section('vendor-style')
<!-- Vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection
@include('front/produk/filter-sidebar')
@section('content')
<!-- E-commerce Content Section Starts -->
<section id="ecommerce-header">
  <div class="row">
    <div class="col-sm-12">
      <div class="ecommerce-header-items">
        <div class="result-toggler">
          <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon d-block d-lg-none"><i class="fas fa-sliders-h"></i></span>
          </button>
          <div class="search-results">{{ $produks->total() }} item</div>
        </div>
        <div class="view-options d-flex">
          <div class="btn-group dropdown-sort hidden">
            <button type="button" class="btn btn-outline-primary dropdown-toggle mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="active-sorting">Featured</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);">Featured</a>
              <a class="dropdown-item" href="javascript:void(0);">Lowest</a>
              <a class="dropdown-item" href="javascript:void(0);">Highest</a>
            </div>
          </div>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
              <input type="radio" name="radio_options" id="radio_option1" checked />
              <i data-feather="grid" class="font-medium-3"></i>
            </label>
            <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
              <input type="radio" name="radio_options" id="radio_option2" />
              <i data-feather="list" class="font-medium-3"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- E-commerce Content Section Starts -->

<!-- background Overlay when sidebar is shown  starts-->
<div class="body-content-overlay"></div>
<!-- background Overlay when sidebar is shown  ends-->

<!-- E-commerce Search Bar Starts -->
<section id="ecommerce-searchbar" class="ecommerce-searchbar hidden">
  <div class="row mt-1">
    <div class="col-sm-12">
      <div class="input-group input-group-merge">
        <input type="text" class="form-control search-product" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
        <div class="input-group-append">
          <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- E-commerce Search Bar Ends -->

<!-- E-commerce Products Starts -->
<section id="ecommerce-products" class="grid-view">
  @foreach($produks as $key => $produk)
    <div class="card ecommerce-card">
      <div class="item-img text-center">
        <a href="{{url('item/'.$produk->id)}}">
          <img class="img-fluid card-img-top" src="{{ asset('uploads/'.$produk->kategori->nama_seo.'/'.$produk->image) }}" alt="img-placeholder" /></a>
      </div>
      <div class="card-body">
        <div class="item-wrapper">
          <div class="item-rating">
            <h6 class="item-price">{{ number_format($produk->harga) }}</h6>
          </div>
  
          <div>
            <span class=""> <a href="{{ url('?kat='.$produk->kategori_id) }}" class="badge badge-light-danger">{{ $produk->kategori->nama }}</a></span>
          </div>
        </div>
        <h6 class="item-name">
          <a class="text-body" href="{{url('item/'.$produk->id)}}">{{ $produk->nama }} </a>
        </h6>
        <p class="card-text item-description mt-1">
          {{ $produk->deskripsi }}
        </p>
  
      </div>
      <div class="item-options text-center">
        <div class="item-wrapper">
          <div class="item-cost">
            <h6 class="item-price ">{{ number_format($produk->harga) }}</h6>
          </div>
        </div>
    
        <a href="https://api.whatsapp.com/send?phone=+6283834477874&text=Halo Arby.ID%0ASaya mau order *{{ $produk->nama }}*%0AApakah stok ada?" class="btn btn-success full-width mt-1">
          <i class="fab fa-whatsapp fa-1x"></i>
          <span class="">Kirim WA</span>
        </a>
      </div>
    </div>
  @endforeach
</section>
<!-- E-commerce Products Ends -->

<!-- E-commerce Pagination Starts -->
<section id="ecommerce-pagination">
  <div class="row">
    <div class="col-sm-12">
      <nav aria-label="Page navigation example">
        {{-- {{ dd($produks) }} --}}
        <ul class="pagination justify-content-center mt-2">
          {{-- <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
          <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
          <li class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
          <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li> --}}
           {{ $produks->onEachSide(2)->withQueryString()->links() }}
        </ul>
      </nav>
    </div>
  </div>
  <span class="col-md-12 float-md-left d-block badge badge-light-success">
    {{ number_format($logPengunjung)}} view <span class="far fa-eye"></span>
  </span>

</section>
<!-- E-commerce Pagination Ends -->
@endsection

@section('vendor-script')
<!-- Vendor js files -->
<script src="{{ asset(mix('vendors/js/extensions/wNumb.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/pages/app-ecommerce.js')) }}"></script>
@endsection
