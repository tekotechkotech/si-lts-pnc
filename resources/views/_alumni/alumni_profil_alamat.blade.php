@extends('template.alumni.main')

@section('tittle','Alumni')
@section('profil','active')


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
        <h1 class="m-0">Ganti Alamat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
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
          <div class="card-body">
            <div class="form-group">
              <label for="Provinsi">Provinsi</label>
              <select name="Provinsi" id="Provinsi" class="form-control @error('Provinsi') is-invalid @enderror">
                <option value="">Pilih Provinsi</option>
                {{-- @foreach ($provinsi as $prov) --}}
                  {{-- <option value="{{ $prov->id }}">{{ $prov->nama }}</option> --}}
                {{-- @endforeach --}}
              </select>
              @error('Provinsi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="Kabupaten">Kabupaten</label>
              <select name="Kabupaten" id="Kabupaten" class="form-control @error('Kabupaten') is-invalid @enderror">
                <option value="">Pilih Kabupaten</option>
              </select>
              @error('Kabupaten')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="Kecamatan">Kecamatan</label>
              <select name="Kecamatan" id="Kecamatan" class="form-control @error('Kecamatan') is-invalid @enderror">
                <option value="">Pilih Kecamatan</option>
              </select>
              @error('Kecamatan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="Desa">Desa</label>
              <select name="Desa" id="Desa" class="form-control @error('Desa') is-invalid @enderror">
                <option value="">Pilih Desa</option>
              </select>
              @error('Desa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="RT">RT</label>
                  <input type="text" class="form-control" id="RT" value="{{ old('RT', $all->rt) }}"  class="form-control @error('RT') is-invalid @enderror">
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
                  <input type="text" class="form-control" id="RW" value="{{ old('RW', $all->rw) }}"  class="form-control @error('RW') is-invalid @enderror">
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
              <input type="text" class="form-control" id="Jalan" value="{{ old('Jalan', $all->jalan) }}"  class="form-control @error('Jalan') is-invalid @enderror">
              @error('Jalan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class=" d-flex justify-content-between">
              <a href="{{ route('alumni.profil') }}"  class="btn btn-secondary">Kembali</a>
              <a href="{{ route('alumni.profil.alamat.proses') }}"  class="btn btn-primary">Simpan</a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
<br>
  </div><!-- /.container -->
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
