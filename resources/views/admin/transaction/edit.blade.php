@extends('layouts.admin')
@section('title', 'Ubah Data Transaksi')
@section('content')
  <div class="card">
    <div class="card-body">
      <form action="#" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group row">
          <div class="col-lg-12">
            <label class="form-label">Anggota</label>
            <input type="text" class="form-control" name="member_name" value="{{ old('member_name', $transaction->member->name) }}" readonly>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" name="date_start"
              value="{{ old('date_start', $transaction->date_start) }}" required>
          </div>
          <div class="col-lg-6">
            <label class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" name="date_end"
              value="{{ old('date_end', $transaction->date_end) }}" required>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
            <label class="form-label">Buku</label>
            <!-- Tambahkan dropdown atau field untuk buku jika dibutuhkan -->
            <select name="book_ids[]" id="book_ids" class="form-control" multiple required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}"
                        {{ in_array($book->id, $transaction->books->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row mt-5">
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('transaction.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
