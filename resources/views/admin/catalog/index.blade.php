@extends('layouts.admin')
@section('title', 'Katalog')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ url('catalog/create') }}" class="btn btn-primary btn-xs btn-flat">
            <i class="fa fa-plus"> Tambah Katalog</i>
          </a>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Katalog</th>
                <th class="text-center">Total Buku</th>
                <th>Created at</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($catalogs as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td class="text-center">{{ count($item->books) }}</td>
                  <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="{{ url('catalog/'.$item->id.'/edit') }}" class="btn btn-warning btn-xs btn-flat">
                        <i class="fa fa-edit"> Ubah</i>
                      </a>
                      <form action="{{ url('catalog', $item->id) }}" method="post">
                        <input type="submit" class="btn btn-danger btn-sm btn-flat" value="Hapus"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                        @method('delete')
                        @csrf
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </div>
@endsection
