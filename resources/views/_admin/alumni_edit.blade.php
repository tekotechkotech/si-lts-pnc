
@extends('template.admin.main')

@section('tittle','Edit Alumni')
@section('alumni','active')

@section('css')
    
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Alumni</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Alumni</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
        <form method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" disabled class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="NIP/NPAK" value="{{ old('nim', $u->nim) }}">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" disabled class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" value="{{ old('name', $u->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" disabled class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username', $u->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="col text-center">
                    <label for="" class="">
                        | or |
                        </label> 
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="form-group">
                        <label for="prodi">Program Study</label>
                        <select class="form-control" id="prodi" name="prodi">
                            <option>{{ $u->prodi }}</option>
                            <option>D3 TI</option>
                            <option>D3 TE</option>
                            <option>D3 TM</option>
                            <option>D3 TL</option>
                            <option>D4 TPPL</option>
                            <option>D4 PPA</option>
                            {{-- <option>Pegawai BAAK</option> --}}
                        </select>
                    </div>
                    
                </div>
            </div>
            <button type="submit" formaction="/admin/data-alumni/{{ $u->id }}" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('js')
    
@endsection