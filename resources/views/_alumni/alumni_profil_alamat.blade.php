@extends('template.alumni.main')

@section('tittle','Alumni')
@section('profil','active')


@section('css')
   
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('header-content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ganti Alamat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Profil</a></li>
          <li class="breadcrumb-item active">Ganti Alamat</li>
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
    
    <div class="row">
      <div class="col">
        <div class="card">
          <form method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="provinsi">Provinsi</label>
              <select name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                {{-- <option value="">Pilih provinsi</option> --}}
                @php
                    $prov = old('provinsi', Auth::user()->provinsi);

                    $id_prov = DB::table('wilayah')
                    ->where('nama_wilayah', $prov)
                    ->first();
                @endphp
                @empty(Auth::User()->provinsi)
                    <option>Pilih Provinsi</option>
                @else
                    <option value='{{ $id_prov->id_wilayah }}'>{{ $prov }}</option>
                @endempty

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
            <div class="form-group">
              <label for="kabupaten">kabupaten</label>
              <select name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror">
                
                @php
                    $prov = old('kabupaten', auth::user()->kabupaten);

                    $id_prov = DB::table('wilayah')
                    ->where('nama_wilayah', $prov)
                    ->first();
                @endphp
                @empty(Auth::User()->kabupaten)
                    <option>Pilih kabupaten/Kota</option>
                @else
                    <option value='{{ $id_prov->id_wilayah }}'>{{ old('kabupaten', auth::user()->kabupaten) }}</option>
                @endempty

              </select>
              @error('kabupaten')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="kecamatan">kecamatan</label>
              <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                
                  @php
                    $prov = old('kecamatan', auth::user()->kecamatan);

                      $id_prov = DB::table('wilayah')
                      ->where('nama_wilayah', $prov)
                      ->first();
                  @endphp
                  @if(Auth::User()->kecamatan="Belum dilengkapi")
                      <option>Pilih kecamatan</option>
                  @else
                      <option value='{{ $id_prov->id_wilayah }}'>{{ old('kecamatan', auth::user()->kecamatan) }}</option>
                  @endif

              </select>
              @error('kecamatan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="desa">desa</label>
              <select name="desa" id="desa" class="form-control @error('desa') is-invalid @enderror">
                
                @php
                    $prov = old('desa', auth::user()->desa);

                    $id_prov = DB::table('wilayah')
                    ->where('nama_wilayah', $prov)
                    ->first();
                @endphp
                @empty(Auth::User()->desa)
                    <option>Pilih desa</option>
                @else
                    <option value='{{ $id_prov->id_wilayah }}'>{{ old('desa', auth::user()->desa) }}</option>
                @endempty

              </select>
              @error('desa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="RT">RT</label>
                  <input type="text" class="form-control" id="RT" name="RT" value="{{ old('RT', $all->rt) }}"  class="form-control @error('RT') is-invalid @enderror">
                  @error('RT')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="RW">RW</label>
                  <input type="text" class="form-control" id="RW" name="RW" value="{{ old('RW', $all->rw) }}"  class="form-control @error('RW') is-invalid @enderror">
                  @error('RW')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="Jalan">Jalan</label>
              <input type="text" class="form-control" id="Jalan" name="Jalan" value="{{ old('Jalan', $all->jalan) }}"  class="form-control @error('Jalan') is-invalid @enderror">
              @error('Jalan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class=" d-flex justify-content-between">
              <a href="{{ route('alumni.profil') }}"  class="btn btn-secondary">Kembali</a>
              
              <button href="{{ route('alumni.profil.alamat.proses') }}"  class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
<br>
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
