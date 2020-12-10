@extends('front/base/detachedLayoutMaster')

@section('title', 'Product Details')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce-details.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-number-input.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">

@endsection

@section('content')
<!-- app e-commerce details start -->
<section class="app-ecommerce-details">
  <div class="card">
    <!-- Product Details starts -->
    <div class="card-body">
      <div class="row my-2">
        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
          <div class="d-flex align-items-center justify-content-center">
            <img
              src="{{ asset('images/pages/eCommerce/1.png') }}"
              class="img-fluid product-img"
              alt="product image"
            />
          </div>
        </div>
        <div class="col-12 col-md-7">
          <h4>{{ $produk->nama }}</h4>

          <span class=""> <a href="" class="btn btn-outline-danger btn-sm">{{ $produk->kategori->nama }}</a></span>
          
          <div class="ecommerce-details-price d-flex flex-wrap mt-1">
            <h4 class="item-price mr-1">{{ number_format($produk->harga) }}</h4>
          </div>
          {{-- <p class="card-text">Available - <span class="text-success">In stock</span></p> --}}
          <p class="card-text">
            {{ $produk->deskripsi }}
          </p>
          <ul class="product-features list-unstyled">
            <li><i data-feather="shopping-cart"></i> <span>Gratis Ongkir</span></li>
          </ul>
          <hr />
          <div class="product-color-options hidden">
            <h6>Colors</h6>
            <ul class="list-unstyled mb-0">
              <li class="d-inline-block selected">
                <div class="color-option b-primary">
                  <div class="filloption bg-primary"></div>
                </div>
              </li>
              <li class="d-inline-block">
                <div class="color-option b-success">
                  <div class="filloption bg-success"></div>
                </div>
              </li>
              <li class="d-inline-block">
                <div class="color-option b-danger">
                  <div class="filloption bg-danger"></div>
                </div>
              </li>
              <li class="d-inline-block">
                <div class="color-option b-warning">
                  <div class="filloption bg-warning"></div>
                </div>
              </li>
              <li class="d-inline-block">
                <div class="color-option b-info">
                  <div class="filloption bg-info"></div>
                </div>
              </li>
            </ul>
          </div>
          <hr />
          <div class="d-flex flex-column flex-sm-row pt-1">

            <a href="https://api.whatsapp.com/send?phone=+6283834477874&text=Halo Arby.ID%0ASaya mau order *{{ $produk->nama }}*%0AApakah stok ada?" class="btn btn-success mr-0 mr-sm-1 mb-1 mb-sm-0">
              <i class="fab fa-whatsapp fa-1x"></i>
              <span class="add-to-cart">Kirim WA</span>
            </a>

            <div class="btn-group dropdown-icon-wrapper btn-share">
              <button
                type="button"
                class="btn btn-icon hide-arrow btn-outline-secondary dropdown-toggle"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i data-feather="share-2"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0)" class="dropdown-item">
                  <i data-feather="facebook"></i>
                </a>
                <a href="javascript:void(0)" class="dropdown-item">
                  <i data-feather="twitter"></i>
                </a>
                <a href="javascript:void(0)" class="dropdown-item">
                  <i data-feather="youtube"></i>
                </a>
                <a href="javascript:void(0)" class="dropdown-item">
                  <i data-feather="instagram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Details ends -->

    <!-- Item features starts -->
    <div class="item-features">
      <div class="row text-center">
        <div class="col-12 col-md-4 mb-4 mb-md-0">
          <div class="w-75 mx-auto">
            <i data-feather="award"></i>
            <h4 class="mt-2 mb-1">100% Original</h4>
            <p class="card-text">Chocolate bar candy canes ice cream toffee. Croissant pie cookie halvah.</p>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4 mb-md-0">
          <div class="w-75 mx-auto">
            <i data-feather="clock"></i>
            <h4 class="mt-2 mb-1">10 Day Replacement</h4>
            <p class="card-text">Marshmallow biscuit donut dragée fruitcake. Jujubes wafer cupcake.</p>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4 mb-md-0">
          <div class="w-75 mx-auto">
            <i data-feather="shield"></i>
            <h4 class="mt-2 mb-1">1 Year Warranty</h4>
            <p class="card-text">Cotton candy gingerbread cake I love sugar plum I love sweet croissant.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Item features ends -->

    <!-- Related Products starts -->
    <div class="card-body hidden">
      <div class="mt-4 mb-2 text-center">
        <h4>Related Products</h4>
        <p class="card-text">People also search for this items</p>
      </div>
      <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Apple Watch Series 6</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="{{ asset('images/elements/apple-watch.png') }}" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$399.98</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Apple MacBook Pro - Silver</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-50">
                <img src="{{ asset('images/elements/macbook-pro.png') }}" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$2449.49</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Apple HomePod (Space Grey)</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="{{ asset('images/elements/homepod.png') }}" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$229.29</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Magic Mouse 2 - Black</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="{{ asset('images/elements/magic-mouse.png') }}" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$90.98</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">iPhone 12 Pro</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="{{ asset('images/elements/iphone-x.png') }}" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$1559.99</p>
              </div>
            </a>
          </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
    <!-- Related Products ends -->
  </div>
</section>
<!-- app e-commerce details end -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-ecommerce-details.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
@endsection
