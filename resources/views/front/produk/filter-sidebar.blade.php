@section('content-sidebar')

<!-- Ecommerce Sidebar Starts -->
<div class="sidebar-shop">
  <div class="row">
    <div class="col-sm-12">
      <h6 class="filter-heading d-none d-lg-block">Filter</h6>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      

      <!-- Categories Starts -->
      <div id="product-categories">
        <form method="get" url="">
        <h6 class="filter-title">Kategori</h6>
        <ul class="list-unstyled categories-list">
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category00" value="" name="kat" class="custom-control-input" checked />
              <label class="custom-control-label" for="category00">Semua</label>
            </div>
          </li>

          @foreach($kategoris as $i => $kat)
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category{{ $i }}" value="{{ $kat->id }}" name="kat" class="custom-control-input" 
              @if($request->kat)
                @if($request->kat == $kat->id)
                  checked
                @endif
              @endif
               />
              <label class="custom-control-label" for="category{{ $i }}">{{ $kat->nama }}</label>
            </div>
          </li>
          @endforeach
        </ul>
        <button class="btn btn-sm btn-primary" type="submit">Apply</button>
        </form>
      </div>
      <!-- Categories Ends -->

    </div>
  </div>
</div>
<!-- Ecommerce Sidebar Ends -->
@endsection
