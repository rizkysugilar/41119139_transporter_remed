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

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                
                  <div class="card-body">
                    <div class="section-title">Tabel {{$title}}</div>
                    <div class="buttons">
                      <a href="{{route('tambah.lokasi')}}" class="btn btn-primary" >Tambah {{$title}}</a>
                    </div>
                    
                    <table class="table table-sm table-dark">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Lokasi</th>
                          <th scope="col">Kode Lokasi</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$item->nama_lokasi}}</td>
                          <td>{{$item->kode_lokasi}}</td>
                          <td>
                            <a href="/lokasi/ {{$item->id}} /destroy" 
                            onclick="return confirm('Yakin akan dihapus?')" 
                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Hapus</a>
                        </td>                        
                    </tr>
                        @endforeach
                      </tbody>
                    </table>
                   
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
        <style>
            .card-body {
                position: relative;
            }

            .buttons {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        </style>
@endsection
