@extends('layouts.admin')
@section('title', 'Tambah Katalog')

@section('content')
  <div class="row">

    <div class="col-md-8">

      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Katalog</h3>
        </div>

        <form class="form-horizontal" action="{{ url('catalog/' . $catalog->id) }}" method="post">
          @csrf
          {{ method_field('put') }}

          <div class="card-body">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Katalog</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $catalog->name }}"
                  placeholder="Katalog" autofocus required>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </div>
          </div>

        </form>
      </div>

    </div>

  </div>
@endsection
