<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.css"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> 

    <title>Export Tracer Study PNC</title>
  </head>
  <body>
      <div class="container-fluid py-3">
    <h1>Export Tracer Study</h1>


    <table id="example" class="table table-striped table-bordered" style="width:100%">
        {{-- <a href="" class="btn btn-success d-flex inline">Tambah Tracer Study</a> --}}
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Prodi</th>
                <th>Tahun Lulus</th>

                <th>Nama Perusahaan</th>

                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>RT</th>
                <th>RW</th>
                <th>Jalan</th>

                <th>Tahun Masuk</th>
                <th>Jabatan</th>
                <th>Gaji Awal</th>
                <th>Gaji Sekarang</th>
                <th>Relevansi Kuliah</th>
                <th>Kursus setelah Kuliah</th>
                <th>Saran Untuk Kampus</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tracer as $tracer)
            <tr>
                <td>{{ $tracer->nim }}</td>
                <td>{{ $tracer->name }}</td>
                <td>{{ $tracer->email }}</td>
                <td>{{ $tracer->no_hp }}</td>

                <td>{{ $tracer->prodi }}</td>
                <td>{{ $tracer->tahun_lulus }}</td>

                <td>{{ $tracer->nama_perusahaan }}</td>
                
                <th>{{ $tracer->provinsi_perusahaan }}</th>
                <th>{{ $tracer->kabupaten_perusahaan }}</th>
                <th>{{ $tracer->kecamatan_perusahaan }}</th>
                <th>{{ $tracer->desa_perusahaan }}</th>
                <th>{{ $tracer->rt_perusahaan }}</th>
                <th>{{ $tracer->rw_perusahaan }}</th>
                <th>{{ $tracer->jalan_perusahaan }}</th>

                <td>{{ $tracer->tahun_masuk }}</td>
                <td>{{ $tracer->jabatan }}</td>
                <td>{{ $tracer->gaji_awal }}</td>
                <td>{{ $tracer->gaji_sekarang }}</td>
                <td>{{ $tracer->relevansi_kuliah }}</td>
                <td>{{ $tracer->kursus_setelah_lulus }}</td>
                <td>{{ $tracer->saran_untuk_kampus }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.js"></script>
    
    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {extend: 'excel', text:'Export Excel', className: 'btn btn-success'}, 'colvis',
            {text: 'Kembali', 
                action: function () {
                    window.location.href = "{{ route('admin.data-tracer') }}";
                },
                className: 'btn btn-secondary'
            }
                
        ]
    } );
} );
    </script>
  </body>
</html>