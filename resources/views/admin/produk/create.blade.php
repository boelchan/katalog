
@extends('admin/base/contentLayoutMaster')

@section('title', 'Tambah data')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
  <div class="row">
    <!-- Bootstrap Validation -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form</h4>
        </div>
        <div class="card-body">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      
          <form action="{{ route('produk.store') }}" method="POST" class="" novalidate enctype="multipart/form-data">
              @csrf

            <div class="form-group">
              <label for="customFile1">Foto Produk</label>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="customFile1" />
                <label class="custom-file-label" for="customFile1">Pilih foto</label>
              </div>
            </div>

            <div class="form-group">
              <label for="basicSelect">Kategori</label>
              <select class="form-control" name="kategori_id">
                @foreach($kategoris as $k => $v)
                  <option value="{{ $k }}">{{ $v }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="form-label" for="">Nama Produk</label>
              <input type="text" name="nama" id="" class="form-control" placeholder="Name" required value="" />
            </div>

            <div class="form-group">
              <label class="d-block" for="validationBioBootstrap">Deskripsi</label>
              <textarea class="form-control" id="" name="deskripsi" rows="3" required ></textarea>
            </div>

            <div class="form-group">
              <label class="form-label" for="">Harga</label>
              <input type="number" name="harga" id="" class="form-control" placeholder="Harga" required value="" />
            </div>

            <div class="form-group">
              <label class="d-block">Tampil</label>
              <div class="custom-control custom-radio my-50">
                <input type="radio" id="validationRadio3" name="tampil" class="custom-control-input" required value="1" checked/>
                <label class="custom-control-label" for="validationRadio3">Ya</label>
              </div>
              <div class="custom-control custom-radio">
                <input
                  type="radio" id="validationRadio4" name="tampil" class="custom-control-input" required value="0" />
                <label class="custom-control-label" for="validationRadio4">Tidak</label>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Bootstrap Validation -->

   
  </div>
</section>
<!-- /Validation -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script> --}}
@endsection
