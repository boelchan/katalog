@extends('admin/base/contentLayoutMaster')

@section('title', 'Produk')

@section('content')
<!-- Basic Tables start -->
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-body">{{ $message }}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endif

      <div class="card-header">
        <h4 class="card-title">Data</h4>
        <a href="{{ route('produk.create') }}" class="btn btn-primary"><i data-feather="plus"></i> Tambah Data</a>
      </div>
      {{-- <div class="card-body">
          <p></p>
      </div> --}}
      <div class="table-responsive table-hover-animation">
        <table class="table">
          <thead>
            <tr>
              <th width="5%"></th>
              <th width="35%">Item</th>
              <th width="15%">Kategori</th>
              <th width="15%">Harga</th>
              <th width="15%">Stok</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($produks as $k => $v)
            <tr>
                <td width="5%">{{ $produks->perPage()*($produks->currentPage()-1)+$k+1 }}</td>
                <td width="35%">{{ $v->nama }}</td>
                <td width="15%">{{ $v->kategori->nama }}</td>
                <td width="15%">{{ number_format($v->harga) }}</td>
                <td width="15%">{{ number_format($v->Stok) }}</td>
                <td width="15%">
                  <form action="{{ route('produk.destroy',$v->id) }}" method="POST">   
                    {{-- <a class="" href="{{ route('produk.show',$v->id) }}"><i data-feather="eye" class="mr-50"></i></a> --}}
                    <a class="btn btn-icon btn-flat-success" href="{{ route('produk.edit',$v->id) }}"><i data-feather="edit-2"></i></a>
  
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-icon btn-flat-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                      <i data-feather="trash"></i> 
                    </button>
                </form>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mt-2">
            {{-- <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
            <li class="page-item active" aria-current="page">
              <a class="page-link" href="javascript:void(0);">4</a>
            </li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
            <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li> --}}
            {{ $produks->onEachSide(2)->withQueryString()->links() }}

          </ul>
        </nav>

      </div>
    </div>
  </div>
</div>
<!-- Basic Tables end -->
@endsection
