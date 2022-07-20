@extends('template.alumni.main')

@section('tittle','Alumni')
@section('tracer','active')


@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('header-content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Tracer Study</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Tracer Study</a></li>
          <li class="breadcrumb-item active">Tambah</li>
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

          <form action="{{ route('alumni.tracer.store') }}" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12">
                
                    <div class="form-group pt-1">
                      <label for="name">Nama Perusahaan</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Perusahaan" value="{{ old('name') }}">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="form-group pt-1">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                          <option></option>
                          
                          @foreach ($provi as $prv)
                              <option value="{{ $prv->id_wilayah }}">{{ $prv->nama_wilayah }}</option>
                          @endforeach
                        </select>

                        @error('provinsi')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="kabupaten">kabupaten</label>
                      <select name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror">
                        <option></option>
                        
                        {{-- @php
                            $prov = old('kabupaten', Auth::user()->kabupaten);

                            $id_prov = DB::table('wilayah')
                            ->where('nama_wilayah', $prov)
                            ->first();
                        @endphp

                        @empty(Auth::User()->kabupaten)
                            <option></option>
                        @else
                            <option value='{{ $id_prov->id_wilayah }}'>{{ old('kabupaten', auth::user()->kabupaten) }}</option>
                        @endempty --}}

                      </select>
                      @error('kabupaten')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="kecamatan">kecamatan</label>
                      <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                        <option></option>
                          {{-- @php
                            $prov = old('kecamatan', auth::user()->kecamatan);

                              $id_prov = DB::table('wilayah')
                              ->where('nama_wilayah', $prov)
                              ->first();
                          @endphp
                          @if(Auth::User()->kecamatan="Belum dilengkapi")
                              <option></option>
                          @else
                              <option value='{{ $id_prov->id_wilayah }}'>{{ old('kecamatan', auth::user()->kecamatan) }}</option>
                          @endif --}}

                      </select>
                      @error('kecamatan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <label for="desa">desa</label>
                      <select name="desa" id="desa" class="form-control @error('desa') is-invalid @enderror">
                        <option></option>
                        
                        {{-- @php
                            $prov = old('desa', auth::user()->desa);

                            $id_prov = DB::table('wilayah')
                            ->where('nama_wilayah', $prov)
                            ->first();
                        @endphp
                        @empty(Auth::User()->desa)
                            <option></option>
                        @else
                            <option value='{{ $id_prov->id_wilayah }}'>{{ old('desa', auth::user()->desa) }}</option>
                        @endempty --}}

                      </select>
                      @error('desa')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group pt-1">
                    <div class="row">
                      <div class="col">
                        <label for="rt">RT</label>
                        <input type="number" min="1" name="rt" class="form-control @error('rt') is-invalid @enderror" id="rt" placeholder="RT" value="{{ old('rt') }}">
                        @error('rt')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="col">
                        <label for="rw">RW</label>
                        <input type="number" min="1" name="rw" class="form-control @error('rw') is-invalid @enderror" id="rw" placeholder="RW" value="{{ old('rw') }}">
                        @error('rw')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="form-group pt-1">
                    <label for="jalan">Jalan</label>
                    <input type="text" name="jalan" class="form-control" >
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group pt-1">
                      <label for="tahun_masuk">Tahun Awal Kerja</label>
                      <input type="number" min="2000" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" placeholder="Tahun Awal Kerja" value="{{ old('tahun_masuk') }}">
                      @error('tahun_masuk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group pt-1">
                      <label for="jabatan">Jabatan</label>
                      <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}">
                      @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group pt-1">
                      <label for="gaji_awal">Gaji Awal</label>
                      <select name="gaji_awal" class="form-control" id="gaji_awal">
                        <option value="Dibawah 3.000.000">Dibawah 3.000.000</option>
                        <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                        <option value="5.000.000 - 7.000.000">5.000.000 - 7.000.000</option>
                        <option value="Diatas 7.000.000">Diatas 7.000.000</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group pt-1">
                      <label for="gaji_sekarang">Gaji Sekarang</label>
                      <select name="gaji_sekarang" class="form-control" id="gaji_sekarang">
                        <option value="Dibawah 3.000.000">Dibawah 3.000.000</option>
                        <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                        <option value="5.000.000 - 7.000.000">5.000.000 - 7.000.000</option>
                        <option value="Diatas 7.000.000">Diatas 7.000.000</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-12">
                
                <div class="form-group pt-1">
                  <label for="relevansi_kuliah">Apakah materi di perkuliahan relevan dengan yang ada di pekerjaan?</label>
                  <select name="relevansi_kuliah" class="form-control" id="relevansi_kuliah">
                    <option value="Relevan">Relevan</option>
                    <option value="Tidak Relevan">Tidak Relevan</option>
                  </select>
                </div>
                <div class="form-group pt-1">
                  <label for="kursus">Apakah setelah lulus mengikuti kursus?</label>
                  <textarea name="kursus" id="kursus" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group pt-1">
                  <label for="saran">Saran kedepan untuk kampus</label>
                  <textarea name="saran" id="saran" class="form-control @error('saran') is-invalid @enderror" rows="5"></textarea>
                  @error('saran')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
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
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(function() {
    
    $('#provinsi').on('change', function() {
      let id_prov = $('#provinsi').val();
      
      console.log(id_prov);

          $.ajax({
              type: 'POST',
              url: "{{ route('getkabupaten') }}",
              data: {
                  id_prov: id_prov
              },
              cache: false,

              success: function(msg) {
                  $('#kabupaten').html(msg);
              },
              error: function(data) {
                  console.log('error:', data)
              }
          })
      })
  });


  $(function() {
      $('#kabupaten').on('change', function() {
          let id_kab = $('#kabupaten').val();

          $.ajax({
              type: 'POST',
              url: "{{ route('getkecamatan') }}",
              data: {
                  id_kab: id_kab
              },
              cache: false,

              success: function(msg) {
                  $('#kecamatan').html(msg);
              },
              error: function(data) {
                  console.log('error:', data)
              }
          })
      })
  });

  $(function() {
      $('#kecamatan').on('change', function() {
          let id_kec = $('#kecamatan').val();

          $.ajax({
              type: 'POST',
              url: "{{ route('getdesa') }}",
              data: {
                  id_kec: id_kec
              },
              cache: false,

              success: function(msg) {
                  $('#desa').html(msg);
              },
              error: function(data) {
                  console.log('error:', data)
              }
          })
      })
  });
</script>
@endsection
