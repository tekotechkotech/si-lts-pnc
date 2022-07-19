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
<div class="content">
    <div class="container-fluid">
          <div class="card">
            <div class="card-body">
  
            <div class="row">
              <div class="col">
                <div class="form-group pt-1">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $tracer->name }}" disabled>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label>NIM</label>
                      <input type="text" class="form-control" value="{{ $tracer->nim }}" disabled>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label>Program Studi</label>
                      <input type="text" class="form-control" value="{{ $tracer->prodi }}" disabled>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label>Tahun Lulus</label>
                      <input type="text" class="form-control" value="{{ $tracer->tahun_lulus }}" disabled>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <hr>
              <div class="row">
                
                <div class="col-lg-8 col-md-8 col-sm-12">
                      <div class="form-group pt-1">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="{{ $tracer->nama_perusahaan }}" disabled>
                  </div>
  
                  <div class="form-group pt-1">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-12">
                          <label for="provinsi">Provinsi</label>
                          <input type="text" class="form-control" value="{{ $tracer->provinsi }}" disabled>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="kabupaten">kabupaten</label>
                        <input type="text" class="form-control" value="{{ $tracer->kabupaten }}" disabled>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="kecamatan">kecamatan</label>
                        <input type="text" class="form-control" value="{{ $tracer->kecamatan }}" disabled>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="desa">desa</label>
                        <input type="text" class="form-control" value="{{ $tracer->desa }}" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="form-group pt-1">
                      <div class="row">
                        <div class="col">
                          <label for="rt">RT</label>
                          <input type="text" class="form-control" value="{{ $tracer->rt }}" disabled>
                        </div>
                        <div class="col">
                          <label for="rw">RW</label>
                          <input type="text" class="form-control" value="{{ $tracer->rw }}" disabled>
                        </div>
                      </div>
                  </div>
                  <div class="form-group pt-1">
                      <label for="jalan">Jalan</label>
                      <input type="text" class="form-control" value="{{ $tracer->jalan }}" disabled>

                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group pt-1">
                        <label for="tahun_masuk">Tahun Awal Kerja</label>
                        <input type="text" class="form-control" value="{{ $tracer->tahun_masuk }}" disabled>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group pt-1">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" value="{{ $tracer->jabatan }}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group pt-1">
                        <label for="gaji_awal">Gaji Awal</label>
                        <input type="text" class="form-control" value="{{ $tracer->gaji_awal }}" disabled>
                      </div>
                    </div>
                    <div class="col">
                        <div class="form-group pt-1">
                        <label for="gaji_awal">Gaji Sekarang</label>
                        <input type="text" class="form-control" value="{{ $tracer->gaji_sekarang }}" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group pt-1">
                    <label for="relevansi_kuliah">Apakah materi di perkuliahan relevan dengan yang ada di pekerjaan?</label>
                    <input type="text" class="form-control" value="{{ $tracer->relevansi_kuliah }}" disabled>
                  </div>
                  <div class="form-group pt-1">
                    <label for="kursus">Apakah setelah lulus mengikuti kursus?</label>
                    <textarea name="kursus" id="kursus" class="form-control" rows="6" disabled>{{ $tracer->kursus_setelah_lulus }}</textarea>
                  </div>
                  <div class="form-group pt-1">
                    <label for="saran">Saran kedepan untuk kampus</label> 
                    <textarea name="saran" id="saran" class="form-control" rows="6" disabled>{{ $tracer->saran_untuk_kampus }}</textarea>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
    </div><!-- /.container -->
  </div>
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