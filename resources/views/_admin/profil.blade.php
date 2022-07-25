@extends('template.admin.main')

@section('tittle','Alumni')
@section('profil','active')


@section('css')  
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('header-content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profil</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('main-content')
<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12">
        
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('') }}assets/profile/{{ $all->foto }}"
                       alt="User profile picture"
                       style="width: 100px;
                        height: 100px;
                        object-fit: cover;"
                        >
                </div>

                <h3 class="profile-username text-center">{{ $all->name }}</h3>

                <p class="text-muted text-center">NIP/NPAK {{ $all->nip_npak }}</p>
                <form action="{{ route('admin.foto') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                  @method('PUT')
                    <input type="hidden" name="username" value="{{ $all->username }}">
                    <label for="foto" class="btn btn-primary btn-block"><b>Ganti Foto Profil</b></label>
                    <input type="file" accept="image/*" onchange="form.submit()" name="foto" id="foto" hidden>
                    @error('foto')
                      <div class="alert alert-danger"><center>{{ $message }}</center></div>
                    @enderror
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          @if ($all->jabatan=="Wakil Direktur 1")
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class=""
                       src="{{ asset('') }}assets/profile/{{ $all->ttd }}"
                       style="width: 100px;
                        height: 100px;
                        object-fit: cover;"
                        >
                </div>
                <br>
                <form action="{{ route('admin.ttd') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                  @method('PUT')
                    <input type="hidden" name="username" value="{{ $all->username }}">
                    <label for="fotos" class="btn btn-primary btn-block"><b>Ganti Tanda Tangan</b></label>
                    <input type="file" accept="image/*" onchange="form.submit()" name="fotos" id="fotos" hidden>
                    @error('fotos')
                      <div class="alert alert-danger"><center>{{ $message }}</center></div>
                    @enderror
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          @endif


            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="nip_npak">NIP/NPAK</label>
                  <input class="form-control" id="nip_npak" value="{{ $all->nip_npak }}" disabled>
                </div>
                <div class="form-group">
                  <label for="ipk">Jabatan</label>
                  <input class="form-control" id="ipk" value="{{ $all->jabatan }}" disabled>
                </div>
                {{-- <div class="form-group"> --}}
                  {{-- <label for="tahun_lulus">Tahun Lulus</label> --}}
                  {{-- <input class="form-control" id="tahun_lulus" value="{{ $all->tahun_lulus }}" disabled> --}}
                {{-- </div> --}}
              </div>
            </div>

      </div>
      <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="card">
          <div class="card-body">
            
            <form method="post">
                  @csrf
                  @method('PUT')
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="name">Nama Lengkap</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $all->name) }}">
                          @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $all->username) }}">
                          @error('username')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="tempat_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $all->tempat_lahir) }}">
                          @error('tempat_lahir')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="tanggal_lahir">Tanggal Lahir</label>
                          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $all->tanggal_lahir) }}">
                          @error('tanggal_lahir')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          {{-- <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $all->jenis_kelamin) }}"> --}}
                          <select name="jenis_kelamin" class="form-control">
                            <option value="{{ $all->jenis_kelamin }}">{{ $all->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                          @error('jenis_kelamin')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                          {{-- <select class="form-control" id="jenis_kelamin">
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                          </select> --}}
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $all->email) }}">
                          @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="no_hp">No. Telp</label>
                          <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $all->no_hp) }}">
                          @error('no_hp')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div><!-- /.container -->
                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> --}}
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="submit" formaction="{{ route('admin.data-diri') }}"  class="btn btn-primary  d-flex justify-content-end">Simpan</button>
                  </div>
            </form>

          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body">
            <form method="post">
              @csrf
              @method('PUT')
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
                    @if(Auth::User()->kecamatan==null)
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
                    <label for="rt">RT</label>
                    <input type="number" class="form-control" id="rt" name="rt" value="{{ old('rt', $all->rt) }}"  class="form-control @error('rt') is-invalid @enderror">
                    @error('rt')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="number" class="form-control" id="rw" name="rw" value="{{ old('rw', $all->rw) }}"  class="form-control @error('rw') is-invalid @enderror">
                    @error('rw')
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
  
              {{-- <div class=" d-flex justify-content-between"> --}}
                {{-- <a href="{{ route('alumni.profil') }}"  class="btn btn-secondary">Kembali</a> --}}
                
                
                
                <div class=" d-flex justify-content-end">
              <button formaction="{{ route('admin.alamat') }}" type="submit" name="submit"  class="btn btn-primary">Simpan</button>
            {{-- </div> --}}
          </form>
              {{-- <a href="{{ route('admin.profil.alamat') }}"  class="btn btn-primary">Edit Alamat</a> --}}
              <!-- Button trigger modal -->
              {{-- <a href="{{ route('admin.alamats') }}">Alamat</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAlamat">
                Edit Alamat
              </button> --}}
            </div>


          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class=" d-flex justify-content-between align-content-center">
            <label for="">Ganti Password</label>
              {{-- <a href="{{ route('admin.profil.password') }}"  class="btn btn-primary">Ganti</a> --}}
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalGanti">
                Ganti
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
<br>
  </div><!-- /.container -->
</div>
<!-- /.content -->


{{-- //////////////////////////////MODAL///////////////////////////// --}}








<!-- Modal Edit Password -->
<div class="modal fade" id="ModalGanti" tabindex="-1" role="dialog" aria-labelledby="ModalGantiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalGantiLabel">Ganti password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="content">
          <div class="container">
            
            <div class="row">
              <div class="col">
        
              <form method="post">
              @csrf
              @method('PUT')
                {{-- <div class="card">
                  <div class="card-body"> --}}
                    <div class="form-group">
                      <label for="Nama">Nama</label>
                      <input class="form-control" id="Nama" value="{{ $all->name }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nip_npak">NIP/NPAK</label>
                      <input class="form-control" id="nip_npak" value="{{ $all->nip_npak }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Konfirmasi Password</label>
                      <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                      @error('password_confirmation')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
        
                  </div>
                </div>
            <br>
          </div><!-- /.container -->
        </div>
        <!-- /.content -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" name="submit" formaction="{{ route('admin.password') }}"  class="btn btn-primary">Simpan Password</button>
        </div>
    </div>
  </form>
  </div>
</div>

@endsection

@section('js')

{{-- @if ($errors->has('no_hp','email','tempat_lahir','tanggal_lahir','jenis_kelamin'))
<script>
    $(function() {
        $('#ModalDataDiri').modal('show');
    });
</script>
@endif --}}


{{-- @if ($errors->has('rt','rw','Jalan','provinsi','kabupaten','kecamatan','desa'))
<script>
$(function() {
    $('#ModalAlamat').modal('show');
});
</script>
@endif --}}


@if ($errors->has('password','password_confirmation'))
<script>
$(function() {
    $('#ModalGanti').modal('show');
});
</script>
@endif

{{-- //WILAYAH// --}}
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