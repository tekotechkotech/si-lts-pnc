@extends('template.alumni.main')

@section('tittle','Alumni')
@section('legal','active')

@section('css')
<style>
  .gr{
    background-image: linear-gradient(blue, cyan);
  }
  </style>    
@endsection

@section('header-content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail legalisir</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">legalisir</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('main-content')
                    @php
                        if($legal->jenis_berkas == 'legalisir Ijazah'){
                            $folder = 'ijazah';
                        }
                        if($legal->jenis_berkas == 'legalisir Transkip Nilai'){
                            $folder = 'transkip';
                        }
                    @endphp
                    @if ($legal->level_acc == "0")
                    @php
                        $level="Menunggu Verifikasi Ketua BAAK";
                    @endphp
                    @elseif ($legal->level_acc == "1")
                    @php
                        $level="Menunggu legalisir Wakil Direktur 1";
                    @endphp
                    @elseif ($legal->level_acc == "2")
                    @php
                        $level="Menunggu Print oleh Pegawai BAAK";
                    @endphp
                    @elseif ($legal->level_acc == "3")
                    @php
                        $level="Menunggu Diambil Alumni";
                    @endphp
                    @elseif ($legal->level_acc == "4")
                    @php
                        $level="legalisir Telah Selesai";
                    @endphp
                    @else
                    @endif
<div class="content">
  <div class="container">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col">
                <div class="form-group pt-1">
                  <label for="jenis">Jenis legalisir</label>
                  <input type="text" class="form-control" value="{{ $legal->jenis_berkas }}" disabled><div class="form-group pt-1">
                </div>
                <div class="form-group pt-1">
                  <label for="jenis">Proses legalisir</label>
                  <input type="text" class="form-control" value="{{ $level }}" disabled>
                </div>
                <div class="form-group pt-1">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" disabled rows="3">{{ $legal->keterangan }}</textarea>
                </div>
              </div>
              <a href="{{ asset('assets/legal/'.$folder.'/'.$legal->upload_berkas) }}" class="btn btn-primary btn-sm btn-block" target="_blank">Lihat File</a>
            </div>

          </div>
        </div>
  </div><!-- /.container -->
</div>
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
