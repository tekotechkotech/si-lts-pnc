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
                    @else
                    @php
                        $level="Legalisir Ditolak";
                    @endphp
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
                            <div class="row pt-2">
                                <div class="col">
                                    <a href="/admin/legalisir/{{ $legal->legal_id }}/{{ $apa }}/detail" class="btn btn-primary  btn-sm btn-block" >Detail</a>
                                </div>
                            @if ($apa!="legal")
                                    @if ($apa == "verifikasi")
                                    <div class="col">
                                        <a class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#Verifikasi{{ $legal->legal_id }}">Verifikasi</a>
                                        {{-- <a href="/admin/legalisir/{{ $legal->legal_id }}/verifikasi" class="btn btn-success btn-sm btn-block" >Verifikasi</a> --}}
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#Tolak{{ $legal->legal_id }}">Tolak</a>
                                    </div>
                                        @elseif ($apa == "legalisir")
                                    <div class="col">
                                        {{-- <a href="/admin/legalisir/{{ $legal->legal_id }}/legalisirs" class="btn btn-success btn-sm btn-block" >Legalisir</a> --}}
                                        <a class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#Legalisir{{ $legal->legal_id }}">ACC Legalisir</a>

                                    </div>
                                    @else
                                    @endif
                                    @endif
                                </div>
                            
                        </td>
                    </tr>

                    
                    
                    
<!-- Modal -->
<div class="modal fade" id="Tolak{{ $legal->legal_id }}" tabindex="-1" aria-labelledby="TolakLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TolakLabel">Yakin Tolak Pengajuan Legalisir?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
              </div>
              <div class="form-group">
                  <button formaction="/admin/legalisir/{{ $legal->legal_id }}/tolak" type="submit" class="btn btn-danger btn-block">Tolak</button>
              </div>
          </form>
  
        </div>
      </div>
    </div>
  </div>

  
<!-- Modal Tolak -->
<div class="modal fade" id="Tolak{{ $legal->legal_id }}" tabindex="-1" aria-labelledby="TolakLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TolakLabel">Yakin Tolak Pengajuan Legalisir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        
        <form method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button formaction="/admin/legalisir/{{ $legal->legal_id }}/tolak" type="submit" class="btn btn-danger btn-block">Tolak</button>
            </div>
        </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Verifikasi -->
<div class="modal fade" id="Verifikasi{{ $legal->legal_id }}" tabindex="-1" aria-labelledby="VerifikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="VerifikasiLabel">Yakin Verifikasi Pengajuan Legalisir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        
        {{-- <form method="post">
            @csrf
            @method('PUT') --}}

            <div class="form-group">
                <a href="/admin/legalisir/{{ $legal->legal_id }}/verifikasi" type="submit" class="btn btn-success btn-block">Verifikasi</a>
            </div>
        {{-- </form> --}}
            </div>
        </div>
    </div>
</div>


<!-- Modal Legalisir -->
<div class="modal fade" id="Legalisir{{ $legal->legal_id }}" tabindex="-1" aria-labelledby="LegalisirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LegalisirLabel">Yakin ACC Pengajuan Legalisir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        
        {{-- <form method="post">
            @csrf
            @method('PUT') --}}
            {{-- <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
            </div> --}}
            <div class="form-group">
                <a href="/admin/legalisir/{{ $legal->legal_id }}/legalisirs" type="submit" class="btn btn-success btn-block">ACC Legalisir</a>
            </div>
        {{-- </form> --}}
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