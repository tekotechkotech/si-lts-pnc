@extends('template.admin.main')

@section('tittle','Maaf anda bukan super admin')


@section('css')
    
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Error, Tidak Bisa Masuk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Error</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('main-content')

    <!-- Main content -->
    <section class="content">
        <div class="error-page pt-5">
          <h2 class="headline text-warning pr-3">MAAF</h2>
  
          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning pt-3"></i> Oops! Kamu bukan superadmin.</h3>
  
            <p>
              Kamu tidak bisa masuk halaman yang ingin kamu tuju karena kamu bukan super admin.
            </p>
  
            
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
      <!-- /.content -->
      
@endsection

@section('js')
    
@endsection