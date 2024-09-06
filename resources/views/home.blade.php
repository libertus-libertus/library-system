@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <div class="col-lg-3 col-6">

      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $total_buku }}</h3>
          <p>Total Buku</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="{{ url('book') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">

      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $total_anggota }}</h3>
          <p>Total Anggota</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="{{ url('member') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">

      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $total_penerbit }}</h3>
          <p>Data Penerbit</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('publisher') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $total_pengarang }}</h3>
          <p>Data Peminjam</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="{{ url('author') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-6">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Data of Publishers</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body bg-light">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-6">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Data of Transactions</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('js')
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript">

      // Data Donut Chart
      const dataDonut = '{!! json_encode($data_donut) !!}';
      const labelDonut = '{!! json_encode($label_donut) !!}';
      const data_bar = '{!! json_encode($data_bar) !!}';

      $(function() {
        //- DONUT CHART -
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
          labels: JSON.parse(labelDonut),
          datasets: [{
            data: JSON.parse(dataDonut),
            backgroundColor: ['#91DDCF', '#A1D6B2', '#CEDF9F', '#F1F3C2', '#E8B86D', '#606676', '#708871',
              '#BEC6A0', '#6C946F', '#FFD35A', '#FFA823', '#DC0083',
            ],
          }]
        }
        var donutOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })

        //- BAR CHART -
        var areaChartData = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
          datasets: JSON.parse(data_bar)
        }

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)

        var barChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })
      })
    </script>
  @endsection
