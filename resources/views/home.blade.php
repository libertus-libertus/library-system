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
@endsection
