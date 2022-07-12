{{-- @php
    dd($legal->name);
@endphp --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- CSS --}}
  @include('template.css')
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    @include('template.nav')
  <div class="content-wrapper">

    <div class="container p-3">
        <h5 class="text-center">Cek Keaslian Data Legalisir Ijazah</h5>
        <div class="row">
            <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                        <h5 class="text-center">
                            <strong >Data Diri Alumni</strong><br>
                            </h5>
                        <hr size="2px">
                        <strong>NIM</strong><br>
                        <span>{{ $legal->nim }}</span>
                        <hr >
                        <strong>Nama</strong><br>
                        <span>{{ $legal->name }}</span>
                        <hr >
                        <strong>Jenis Kelamin</strong><br>
                        <span>{{ $legal->jenis_kelamin }}</span>
                        <hr >
                        <strong>Tahun Lulus</strong><br>
                        <span>{{ $legal->tahun_lulus }}</span>
                        <hr >
                        <strong>Program Studi</strong><br>
                        <span>{{ $legal->prodi }}</span>
                    </div></div>
                </div></div>
                <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">
                            <strong >Data Berkas Legalisir</strong><br>
                            </h5>
                        <hr size="2px">
                        <strong>Status Dokumen</strong><br>
                        <span>{{ $legal->nim }}</span>
                        <hr >
                        <strong>Masa Aktif Legalisir</strong><br>
                        <span>{{ $legal->name }}</span>
                        <hr >
                        <strong>Tgl. Legalisir</strong><br>
                        <span>{{ $legal->jenis_kelamin }}</span>
                        <hr >
                        <strong>Tgl. Kadaluarsa</strong><br>
                        <span>{{ $legal->tahun_lulus }}</span>
                        <hr >
                    </div>
                </div>
                {{-- <label>Status Dokumen</label> --}}

            </div>
        </div>
    </div>

  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  @include('template.foot')
</div>
@include('template.js')

</body>
</html>
