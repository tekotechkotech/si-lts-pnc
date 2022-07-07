@extends('template.admin.main') @section('tittle','Tracer Study') @section('tracer','active') @section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.css" /> 
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css"> --}}
@endsection @section('header-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tracer Study</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Tracer Study</li>
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
                {{-- <a href="" class="btn btn-success d-flex inline">Tambah Tracer Study</a> --}}
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Nama Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Tahun Masuk</th>
                        <th>Gaji Awal</th>
                        <th>Gaji Sekarang</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tracer as $tracer)
                    <tr>
                        <td>{{ $tracer->nim }}</td>
                        <td>{{ $tracer->name }}</td>
                        <td>{{ $tracer->email }}</td>
                        <td>{{ $tracer->no_hp }}</td>
                        <td>{{ $tracer->nama_perusahaan }}</td>
                        <td>{{ $tracer->jabatan }}</td>
                        <td>{{ $tracer->tahun_masuk }}</td>
                        <td>{{ $tracer->gaji_awal }}</td>
                        <td>{{ $tracer->gaji_sekarang }}</td>
                        <td>
                            <a href="/admin/data-admin/{{ $tracer->tracer_id }}" class="btn btn-sm btn-primary" >Detail</a>
                        </td>
                    </tr>
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
            //     {text: 'Tambah Tracer Study', 
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