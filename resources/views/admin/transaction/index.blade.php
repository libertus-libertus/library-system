@extends('layouts.admin')
@section('title', 'Transaction')

@section('content')

  {{-- @role('petugass') --}}
    <div id="controller">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-10">
              <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-plus-circle"> Tambah Transaksi</i>
              </a>
            </div>
            <div class="col-md-2">
              <select class="form-control" name="status" onchange="window.location.href='?status='+this.value">
                <option value="">Filter Status</option>
                <option value="returned">Sudah Dikembalikan</option>
                <option value="not_returned">Belum Dikembalikan</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table id="datatable" class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Nama Peminjam</th>
                <th>Lama Pinjam</th>
                <th>Qty</th>
                <th>Total Bayar</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->date_start }}</td>
                  <td>{{ $item->date_end ?? '-' }}</td>
                  <td>{{ $item->member->name }}</td>
                  <td>
                    @if ($item->date_end)
                      {{ \Carbon\Carbon::parse($item->date_start)->diffInDays(\Carbon\Carbon::parse($item->date_end)) }}
                      Hari
                    @else
                      -
                    @endif
                  </td>
                  <td class="text-center">{{ $item->transactionDetails->sum('qty') }}</td>
                  <td class="text-right">
                    {{ $item->transactionDetails->sum(function ($detail) {
                        return $detail->qty * $detail->book->price;
                    }) }}
                  </td>
                  <td class="text-center">
                    {{ $item->status == 'returned' ? 'Yes' : 'No' }}
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                      </a>
                      <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </button>
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
  {{-- @endrole --}}
@endsection
