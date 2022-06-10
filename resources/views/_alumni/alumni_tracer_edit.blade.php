@extends('template.alumni.main')

@section('tittle','Alumni')
@section('tracer','active')


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
        <h1 class="m-0">Edit Tracer Study</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Tracer Study</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('main-content')
<div class="content">
  <div class="container">
        <div class="card">
          <div class="card-body">
{{-- //TODO BELUM DI TAMBAHIN VALUE --}}
            <form action="" method="post">
              @csrf
              @method('PUT')
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="form-group pt-1">
                  <label for="name">Nama</label>
                  <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <div class="form-group pt-1">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="provinsi">Provinsi</label>
                      <select name="provinsi" class="form-control" id="provinsi">
                        <option value="">Pilih Provinsi</option>
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="kabupaten">Kabupaten</label>
                      <select name="kabupaten" class="form-control" id="kabupaten">
                        <option value="">Pilih Kabupaten</option>
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="kecamatan">Kecamatan</label>
                      <select name="kecamatan" class="form-control" id="kecamatan">
                        <option value="">Pilih Kecamatan</option>
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="desa">Desa</label>
                      <select name="desa" class="form-control" id="desa">
                        <option value="">Pilih Desa</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group pt-1">
                    <div class="row">
                      <div class="col">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" class="form-control" placeholder="rt">
                      </div>
                      <div class="col">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" class="form-control" placeholder="rw">
                      </div>
                    </div>
                </div>
                <div class="form-group pt-1">
                    <label for="jalan">Jalan</label>
                    <input type="text" name="jalan" class="form-control" placeholder="jalan">
                </div>
                <div class="form-group pt-1">
                  <label for="tahun_masuk">Tahun Awal Kerja</label>
                  <input type="text" name="tahun_masuk" class="form-control" placeholder="tahun_masuk">
                </div>
                <div class="form-group pt-1">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" placeholder="jabatan">
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group pt-1">
                      <label for="gaji_awal">Gaji Awal</label>
                      <select name="gaji_awal" class="form-control" id="gaji_awal">
                        <option value="">Pilih Gaji Awal</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group pt-1">
                      <label for="gaji_sekarang">Gaji Sekarang</label>
                      <select name="gaji_sekarang" class="form-control" id="gaji_sekarang">
                        <option value="">Pilih Gaji Sekarang</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-12">
                
                <div class="form-group pt-1">
                  <label for="relevansi_kuliah">Apakah materi di perkuliahan relevan dengan yang ada di pekerjaan?</label>
                  <select name="relevansi_kuliah" class="form-control" id="relevansi_kuliah">
                    <option value="">Relevan</option>
                    <option value="">Tidak Relevan</option>
                  </select>
                </div>
                <div class="form-group pt-1">
                  <label for="kursus">Apakah setelah lulus mengikuti kursus?</label>
                  <textarea name="kursus" id="kursus" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group pt-1">
                  <label for="saran">Saran kedepan untuk kampus</label>
                  <textarea name="saran" id="saran" class="form-control" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </div>
            </div>
            </form>

          </div>
        </div>
  </div><!-- /.container -->
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
