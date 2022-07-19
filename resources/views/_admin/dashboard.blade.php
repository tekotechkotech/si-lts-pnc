@extends('template.admin.main')

@section('tittle','Blank Page')
@section('dashboard','active')

@section('css')
    
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
    
        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $alumni }}</h3>

                <p>Data Alumni</p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{ $tracer }}</h3>

                <p>Data Tracer Study</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $legal }}</h3>

                <p>Pengajuan Legalisir</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{ $prolegal }}</h3>

                <p>Proses Legalisir</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-medical-alt"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $acclegal }}</h3>

                <p>Berkas Dilegalisir</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-signature"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{ 
                  $today = Carbon\Carbon::now()->format('d');
                  }}<sup style="font-size: 20px">
                  {{ 
                    $today = Carbon\Carbon::now()->format('m-y');
                    }}</sup></h3>

                <p>Update Terakhir</p>
              </div>
              <div class="icon">
                <i class="fas fa-clock"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
<div class="row">
  <div class="col-md-4 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="chart">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div></div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div></div></div>
          {{-- <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 355px;" width="710" height="500" class="chartjs-render-monitor"></canvas> --}}
          <canvas id="tracer"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="chart">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div></div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div></div></div>
          {{-- <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 355px;" width="710" height="500" class="chartjs-render-monitor"></canvas> --}}
          <canvas id="relevansi"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="chart">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div></div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div></div></div>
          {{-- <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 355px;" width="710" height="500" class="chartjs-render-monitor"></canvas> --}}
          <canvas id="gaji"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
        

        
    </div>
</section>
<!-- /.content -->
@endsection

@section('js')
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- BUKA TRACER 1 --}}
      <script>
        const labels = [
          @foreach($tahun as $t)
            {{ $t->tahun }},
          @endforeach
        ];
        
        const data = {
          labels: labels,
          datasets: [
            {
            label: 'Laki-laki',
            backgroundColor: 'red',
            borderColor: 'red',
            data: 
            [
              @foreach($cowo as $co)
                {{ $co->hitung }},
              @endforeach
            ],
          },
            {
            label: 'Perempuan',
            backgroundColor: 'blue',
            borderColor: 'blue',
            data: [
              @foreach($cewe as $ce)
                {{ $ce->hitung }},
              @endforeach
            ],
          }
        ]
        };
      
        const config = {
          type: 'line',
          data: data,
          options: {}
        };

        const myChart1 = new Chart(
          document.getElementById('tracer'),
          config
        );
      </script>
{{-- TUTUP TRACER 1 --}}
{{-- BUKA TRACER 2 --}}
<script>
  const labels1 = [
    @foreach($tahun as $t)
      {{ $t->tahun }},
    @endforeach
  ];
  
  const data2 = {
    labels: labels1,
    datasets: [
      {
      label: 'Laki-laki',
      backgroundColor: 'red',
      borderColor: 'red',
      data: 
      [
        @foreach($relevancowo as $co)
          {{ $co->hitung }},
        @endforeach
      ],
    },
      {
      label: 'Perempuan',
      backgroundColor: 'blue',
      borderColor: 'blue',
      data: [
        @foreach($relevancewe as $ce)
          {{ $ce->hitung }},
        @endforeach
      ],
    }
  ]
  };

  const config1 = {
    type: 'bar',
    data: data2,
    options: {}
  };

  const myChart2 = new Chart(
    document.getElementById('relevansi'),
    config1
  );
</script>
{{-- TUTUP TRACER 2 --}}
{{-- BUKA TRACER 3 --}}
<script>
  const labels3 = [
    @foreach($tahun as $t)
      {{ $t->tahun }},
    @endforeach
  ];
  
  const data3 = {
    labels: labels3,
    datasets: [
      {
      label: '< Rp. 3 Juta',
      backgroundColor: 'red',
      borderColor: 'red',
      data: 
      [
        @foreach($gaji3 as $g3)
          {{ $g3->hitung }},
        @endforeach
      ],
    },
      {
      label: 'Rp. 3 Jt - Rp. 5 Jt',
      backgroundColor: 'yellow',
      borderColor: 'yellow',
      data: [
        @foreach($gaji35 as $g35)
          {{ $g35->hitung }},
        @endforeach
      ],
    },
    {
      label: 'Rp. 5 Jt - Rp. 7 Jt',
      backgroundColor: 'green',
      borderColor: 'green',
      data: 
      [
        @foreach($gaji57 as $g57)
          {{ $g57->hitung }},
        @endforeach
      ],
    },
      {
      label: '> Rp. 7 Juta',
      backgroundColor: 'blue',
      borderColor: 'blue',
      data: [
        @foreach($gaji7 as $g7)
          {{ $g7->hitung }},
        @endforeach
      ],
    }
  ]
  };

  const config2 = {
    type: 'line',
    data: data3,
    options: {}
  };

  const myChart3 = new Chart(
    document.getElementById('gaji'),
    config2
  );
</script>
{{-- TUTUP TRACER 3 --}}
@endsection