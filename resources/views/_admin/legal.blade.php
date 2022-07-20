@extends('template.admin.main') 
@section('tittle','legalisir') 


@section($proses,'active menu-open') 


@section($apa,'active') 

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.css" /> 

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
                    <li class="breadcrumb-item active">legalisir</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
@endsection @section('main-content')
<section class="content">
    <div class="container-fluid">
        <!-- Default box -->

        <!-- Small Box (Stat card) -->
        {{-- <div class="row"> --}}
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                {{-- <a href="" class="btn btn-success d-flex inline">Tambah Admin</a> --}}
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis legalisir</th>
                        <th>Keterangan</th>
                        @if ($apa == "legal")
                        <th>Proses</th>
                        @endif
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($legal as $legal)
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
                        $level="Legalisir Selesai";
                    @endphp
                        {{-- @elseif ($legal->level_acc == "3")
                        @php
                            $level="Menunggu Diambil Alumni";
                        @endphp
                        @elseif ($legal->level_acc == "4")
                        @php
                            $level="legalisir Telah Selesai";
                        @endphp
                        @else
                        @php
                            $level="legalisir Ditolak";
                        @endphp --}}
                    @endif

                    <tr>
                        <td>{{ $legal->nim }}</td>
                        <td>{{ $legal->name }}</td>
                        <td>{{ $legal->jenis_berkas }}</td>
                        <td>{{ $legal->keterangan }}</td>
                        @if ($apa == "legal")
                        <td>{{ $level }}</td>
                        @endif
                        <td>
                            <a href="/admin/legalisir/{{ $legal->legal_id }}/{{ $apa }}/detail" class="btn btn-sm btn-primary" >Detail</a>
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalDetail{{ $legal->legal_id }}">
                                Detail
                            </button> --}}
                        </td>
                    </tr>

                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="ModalDetail{{ $legal->legal_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail legalisir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ asset('assets/berkas/'.$legal->upload_berkas) }}">
                                        <div class="form-group ">
                                            <label>Nama Alumni Pengaju legalisir</label>
                                            <input type="text" class="form-control" value="{{ $legal->name }}" disabled><div class="form-group ">
                                        </div>
                                        <div class="form-group ">
                                            <label for="nim">NIM</label>
                                            <input type="text" class="form-control" value="{{ $legal->nim }}" disabled><div class="form-group ">
                                        </div>
                                        <div class="form-group ">
                                            <label for="jenis">Jenis legalisir</label>
                                            <input type="text" class="form-control" value="{{ $legal->jenis_berkas }}" disabled><div class="form-group ">
                                        </div>
                                        <div class="form-group ">
                                            <label for="jenis">Proses legalisir</label>
                                            <input type="text" class="form-control" value="{{ $level }}" disabled>
                                        </div>
                                        <div class="form-group ">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" class="form-control" disabled rows="3">{{ $legal->keterangan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- </div>
                        <div class="modal"> --}}
                            <a href="{{ asset('assets/legal/'.$folder.'/'.$legal->upload_berkas) }}" class="btn btn-primary btn-sm btn-block" target="_blank">Lihat Berkas</a>
                            @if ($apa!="legal")
                            <div class="row pt-2">
                                <div class="col">
                                        @if ($apa == "verifikasi")
                                        <a href="/admin/legalisir/{{ $legal->legal_id }}/verifikasi" class="btn btn-sm btn-success btn-block" >Verifikasi</a>
                                        @elseif ($apa == "legalisir")
                                        <a href="/admin/legalisir/{{ $legal->legal_id }}/legalisirs" class="btn btn-sm btn-success btn-block" >legalisir</a>
                                        @else
                                        @endif
                                    </div>
                                    <div class="col">
                                        <a href="/admin/legalisir/{{ $legal->legal_id }}/tolak" class="btn btn-sm btn-danger btn-block" >Tolak</a>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        {{-- </div> --}}
    </div>
</section>
<!-- /.content -->
@endsection @section('js')

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script> --}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: true,
            responsive: true,
            // buttons: [ 
            //     {extend: 'excel', text:'Export Excel', className: 'btn btn-success'}, 'colvis',
            //     {text: 'Tambah Admin', 
            //     action: function () {
            //         window.location.href = "{{ route('admin.data-admin.create') }}";
            //     },
            //     className: 'btn btn-info'
            // }]
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection