@extends('layouts.admin')
@section('title', 'Tambah Data Transaksi')
@section('content')
  <div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="form-label">Anggota</label>
                <select name="member_id" class="form-control">
                    <option selected disabled>Pilih Anggota</option>
                    @foreach ($members as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="date_start">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="date_end">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="form-label">Buku</label>
                <select name="book_id" class="form-control">
                    <option disabled selected>Pilih Buku</option>
                    @foreach ($books as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
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
    </div>
  </div>
@endsection
