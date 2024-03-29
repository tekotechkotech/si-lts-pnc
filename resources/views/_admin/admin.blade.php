@extends('template.admin.main') @section('tittle','Tambah Admin') @section('admin','active') @section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.css" /> 
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css"> --}}
@endsection @section('header-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
                        <th>NIP/NPAK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>jabatan</th>
                        <th>Email</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($u as $u)
                    <tr>
                        <td>{{ $u->nip_npak }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->jabatan }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <div class="d-flex justify-content-center">

                                <a href="/admin/data-admin/{{ $u->id }}/detail" class="btn btn-block btn-sm btn-primary m-1" >Detail</a>
                                @if (Auth::user()->admin->jabatan == 'Super Admin')
                                <a href="/admin/data-admin/{{ $u->id }}/edit" class="btn btn-block btn-sm btn-success m-1">Edit</a>
                                {{-- <form action="/admin/data-admin/{{ $u->id }}" method="post"> --}}
                                    {{-- @csrf --}}
                                    {{-- @method('DELETE') --}}
                                    {{-- <button type="submit" class="btn btn-block btn-sm btn-danger m-1">Hapus</button> --}}
                                {{-- </form> --}}
                                <a  class="btn btn-block btn-sm btn-danger m-1" data-toggle="modal" data-target="#Hapus{{ $u->admin_id }}" >Hapus</a>
                                @endif
                            </div>
                        </td>
                    </tr>

                    
    <!-- ModalHapus -->
    <div class="modal fade" id="Hapus{{ $u->admin_id }}" tabindex="-1" aria-labelledby="HapusLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="HapusLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><h5>Yakin akan menghapus akun ini?</h5></center>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" disabled class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="NIM" value="{{ old('nim', $u->nip_npak) }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" disabled class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" value="{{ old('name', $u->name) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" disabled class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username', $u->username) }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
                <form action="/admin/data-alumni/{{ $u->user_id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn  btn-danger m-1" >Hapus</button>
                </form>

            </div>
            </div>
        </div>
        </div>

        {{-- MODAL END --}}
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

@if (Auth::user()->admin->jabatan == 'Super Admin')
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            responsive: true,
            buttons: [ 
                {extend: 'excel', text:'Export Excel', className: 'btn btn-success'}, 'colvis',
                {text: 'Tambah Admin', 
                action: function () {
                    window.location.href = "{{ route('admin.data-admin.create') }}";
                },
                className: 'btn btn-info'
            }]
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
@endif

@if (Auth::user()->admin->jabatan != 'Super Admin')
<script>

    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: true,
            responsive: true,
        });
        
        table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    </script>
@endif
@endsection