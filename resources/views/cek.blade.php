<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/pnc-logo.png') }}">
    {{-- CSS --}} 
    @include('template.css')
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('template.nav')
        <div class="content-wrapper">

            <div class="container p-3">
                <h5 class="text-center">Status Keaslian Data Legalisir Ijazah</h5>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">
                                    <strong>Data Berkas Legalisir</strong><br>
                                </h5>
                                <hr size="2px">
                                <strong>Status Legalisir</strong><br>
                                @php
                                    $today = date("Y-m-d");
                                @endphp
                                @if ($today < $legal->berlaku_sampai)
                                <span class="text-success">AKTIF</span>
                                @else
                                <span class="text-danger">TIDAK AKTIF</span>
                                @endif
                                <hr>
                                {{-- <strong>Masa Aktif Legalisir</strong><br>
                                <span>
                                    {{ \Carbon\Carbon::parse($legal->berlaku_sampai)->diffForHumans() }}
                                </span>
                                <hr> --}}
                                <strong>Tgl. Legalisir</strong><br>
                                <span>
                                    {{ Carbon\Carbon::parse($legal->updated_at)->format('d-M-Y') }}
                                </span>
                                <hr>
                                <strong>Tgl. Kadaluwarsa</strong><br>
                                <span>
                                    {{ Carbon\Carbon::parse($legal->berlaku_sampai)->format('d-M-Y') }}
                                    {{-- {{ $legal->berlaku_sampai }} --}}
                                </span>
                                <hr>
                                <p class="text-center">Masa aktif legalisir <strong>
                                    2 bulan 
                                    </strong> 
                                    terhitung dari tanggal berkas dilegalisir</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">
                                    <strong>Data Diri Alumni</strong><br>
                                </h5>
                                <hr size="2px">
                                <strong>NIM</strong><br>
                                <span>{{ $legal->nim }}</span>
                                <hr>
                                <strong>Nama</strong><br>
                                <span>{{ $legal->name }}</span>
                                <hr>
                                <strong>Jenis Kelamin</strong><br>
                                <span>{{ $legal->jenis_kelamin }}</span>
                                <hr>
                                <strong>Tahun Lulus</strong><br>
                                <span>{{ $legal->tahun_lulus }}</span>
                                <hr>
                                <strong>Program Studi</strong><br>
                                <span>{{ $legal->prodi }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center pt-3">
                                    Dokumen ini telah resmi 
                                    <strong>dilegalisir</strong> 
                                    secara elektronik, menggunakan 
                                    <strong>legalisir elektronik</strong>
                                    , yang di terbitkan oleh <br>
                                    <strong>Politeknik Negeri Cilacap</strong>
                                    .
                                </p>
                                <img src="{{ asset('assets/img/pnc-logo.png') }}" >

                            </div>
                        </div>
                    </div>
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