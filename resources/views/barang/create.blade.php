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
                    <form action="{{route('store.barang')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Barang</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Barang</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="stock_barang" id="stock_barang">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Barang</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="harga_barang" id="harga_barang">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Barang</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Add {{$title}}</button>
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