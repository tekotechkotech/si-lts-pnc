
@extends('template.admin.main')

@section('tittle','Tambah Data Alumni')
@section('alumni','active')

@section('css')
    
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Alumni</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Alumni</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <form action="{{ route('admin.data-alumni.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select class="form-control" id="prodi" name="prodi">
                    <option>D3 TI</option>
                    <option>D3 TM</option>
                    <option>D3 TL</option>
                    <option>D3 TE</option>
                    <option>D4 TPPL</option>
                    <option>D4 PPA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}">
                  @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('js')
    
@endsection