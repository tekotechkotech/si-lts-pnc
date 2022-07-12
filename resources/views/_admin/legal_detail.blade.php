@extends('template.admin.main') 
@section('tittle','legalisir') 


@section($proses,'active menu-open') 


@section($apa,'active') 

@section('css')

@endsection @section('header-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Legalisir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/">legalisir</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
@endsection @section('main-content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
  
            <div class="row">
                <div class=" col-lg-8 col-md-8 col-sm-12">
                    <img src="{{ asset('assets/berkas//'.$legal->upload_berkas) }}" class="card-img-top" >
                </div>
            <div class="  col-lg-4 col-md-4 col-sm-12">
                @php
                    if($legal->level_acc == 0){
                        $status = 'Menunggu Verifikasi';
                        $percen = '20';
                    }elseif($legal->level_acc == 1){
                        $status = 'Telah Diverifikasi, Menunggu legalisir';
                        $percen = '40';
                    }elseif($legal->level_acc == 3){
                        $status = 'Telah Dilegalisir, Tinggal Cetak';
                        $percen = '60';
                    }elseif($legal->level_acc == 4){
                        $status = 'Telah Dicetak, Menunggu Diambil';
                        $percen = '80';
                    }elseif($legal->level_acc == 5){
                        $status = 'Telah Diambil, Pengajuan legalisir Selesai';
                        $percen = '100';
                    }else {
                    $status = 'Ditolak';
                    $percen = '0';
                    }
                @endphp

                    <div class="form-group pt-1">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $legal->name }}" disabled>
                    </div>
                    <div class="form-group pt-1">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ $legal->nim }}" disabled>
                    </div>
                    <div class="form-group pt-1">
                        <label for="jenis">Jenis legalisir</label>
                        <input type="text" name="jenis" class="form-control" value="{{ $legal->jenis_berkas }}" disabled>
                    </div>
                    <div class="form-group pt-1">
                        <label for="Proses">Proses legalisir</label>
                        <input type="text" name="Proses" class="form-control" value="{{ $status }}" disabled>
                    </div>
                    <div class="form-group pt-1">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3" disabled>{{ $legal->keterangan }}</textarea>
                    </div>

                    @if ($apa!="legal")
                            <div class="row pt-2">
                                <div class="col">
                                        @if ($apa == "verifikasi")
                                        <a href="/admin/legalisir/{{ $legal->legal_id }}/verifikasi" class="btn btn-success btn-block" >Verifikasi</a>
                                        @elseif ($apa == "legalisir")
                                        <a href="/admin/legalisir/{{ $legal->legal_id }}/legalisirs" class="btn btn-success btn-block" >Legalisir</a>
                                        @else
                                        @endif
                                    </div>
                                    <div class="col">
                                        <a href="/admin/legalisir/{{ $legal->legal_id }}/tolak" class="btn btn-danger btn-block" >Tolak</a>
                                    </div>
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
    </div><!-- /.container -->
  </div>
  <!-- /.content -->
@endsection @section('js')


@endsection