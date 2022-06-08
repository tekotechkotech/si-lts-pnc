
@extends('template.admin.main')

@section('tittle','Tambah Admin')
@section('admin','active')

@section('css')
    
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('main-content')
<section class="content">
    <div class="container">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <form method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nip_npak">NIP/NPAK</label>
                <input type="text" disabled class="form-control @error('nip_npak') is-invalid @enderror" id="nip_npak" name="nip_npak" placeholder="NIP/NPAK" value="{{ old('nip_npak', $u->nip_npak) }}">
                @error('nip_npak')
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
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control" id="jabatan" name="jabatan">
                    <option>{{ $u->jabatan }}</option>
                    <option>Super Admin</option>
                    <option>Wakil Direktur 1</option>
                    <option>Kepala BAAK</option>
                    <option>Pegawai BAAK</option>
                </select>
            </div>
            <button type="submit" formaction="/admin/data-admin/{{ $u->id }}" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('js')
    
@endsection