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
        <h6 class="filter-title">Kategori</h6>
        <ul class="list-unstyled categories-list">
          @foreach($kategoris as $i => $kat)
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category1" name="category-filter" class="custom-control-input"  />
              <label class="custom-control-label" for="category1">{{ $kat->nama }}</label>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
      <!-- Categories Ends -->

      <!-- Clear Filters Starts -->
      <div id="clear-filters">
        <button type="button" class="btn btn-block btn-primary">Clear All Filters</button>
      </div>
      <!-- Clear Filters Ends -->
    </div>
  </div>
</div>
<!-- Ecommerce Sidebar Ends -->
@endsection
