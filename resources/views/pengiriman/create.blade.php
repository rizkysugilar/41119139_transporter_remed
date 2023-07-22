@extends('layout.admin.app')
@section('tabel')
<section class="section">
          <div class="section-header">
            <h1>{{$title}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          
              <div class="breadcrumb-item">{{$title}}</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">{{$title}}</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{$title}}</h4>
                  </div>
                  @if(session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                  <form action="{{route('store.pengiriman')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="lokasi_id">
                        @foreach ($lokasi as $data)
                          <option value="{{$data->id}}">{{$data -> nama_lokasi}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Barang</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="barang_id">
                          @foreach ($barang as $item)
                          <option value="{{$item->id}}">{{$item -> nama_barang}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Barang</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="jumlah_barang">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Barang</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="harga_barang" value="">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Publish</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection