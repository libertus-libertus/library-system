@extends('layouts.admin')
@section('title', 'Halaman Buku')

@section('css')
  <!-- DataTable -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
  <div id="controller">
    <div class="row">
      <div class="col-md-5 offset-md-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
          </div>
          <input type="text" class="form-control" autocomplete="off" placeholder="Cari berdasarkan judul" v-model="search">
        </div>
      </div>

      <div class="col-md-2">
        <button class="btn btn-primary" @click="tambahData()">
            <i class="fa fa-plus-circle"></i>
            Tambah Buku
        </button>
      </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
            <div class="info-box" v-on:click="ubahData(book)">
                <div class="info-box-content">
                    <span class="info-box-text h3">@{{ book.title }} (@{{ book.qty }})</span>
                    <span class="info-box-number">Rp. @{{ numberWithSpaces(book.price) }},-<small></small></span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form :action="actionUrl" method="post" autocomplete="off">
              <div class="modal-header">
                <h4 class="modal-title">Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @csrf
                <input type="hidden" name="_method" :value="editStatus ? 'PUT' : 'POST'">
                    {{-- <input type="hidden" name="_method" value="PUT" v-if="editStatus"> --}}
                <input type="hidden" name="_method" value="put" v-if="editStatus">
                <div class="form-group">
                  <label for="isbn">ISBN</label>
                  <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" :value="book.isbn" autofocus required>
                </div>
                <div class="form-group">
                  <label for="title">Judul Buku</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Judul Buku" :value="book.title" autofocus required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="publisher_id">Penerbit</label>
                            <select name="publisher_id" id="publisher_id" class="form-control">
                                @foreach ($publishers as $item)
                                    <option :selected="book.publisher_id == {{ $item->id }}" value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="author_id">Pengarang</label>
                            <select name="author_id" id="author_id" class="form-control">
                                @foreach ($authors as $item)
                                    <option :selected="book.author_id == {{ $item->id }}" value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="catalog_id">Katalog</label>
                  <select name="catalog_id" id="catalog_id" class="form-control">
                    @foreach ($catalogs as $item)
                        <option :selected="book.catalog_id == {{ $item->id }}" value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="qty">Tahun</label>
                            <input type="number" class="form-control" name="year" id="year" placeholder="Tahun" :value="book.year" autofocus required>
                        </div>
                        <div class="col">
                            <label for="qty">Stok Buku</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Stok Buku" :value="book.qty" autofocus required>
                        </div>
                        <div class="col">
                            <label for="price">Harga Pinjam</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Harga" :value="book.price" autofocus required>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger btn-xs btn-flat" v-if="editStatus"  v-on:click="hapusData(book.id)">Hapus</button>
                <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </div>
@endsection

@section('js')
    <script type="text/javascript">
        // Ambil CSRF token dari meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Konfigurasikan Axios untuk menggunakan CSRF token
        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

        var actionUrl = '{{ url('book') }}';
        var apiUrl = '{{ url('api/book') }}';

        var app = new Vue({
            el: '#controller',
            data: {
                books: [],
                search: '',
                book: {},
                editStatus: false,
                actionUrl: actionUrl // Pastikan actionUrl terdefinisi di data
            },
            mounted: function () {
                this.get_books();
            },
            methods: {
                get_books() {
                    const _this = this;
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function (data) {
                            _this.books = JSON.parse(data);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                },
                tambahData() {
                    this.book = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                ubahData(book) {
                    this.book = Object.assign({}, book);
                    this.editStatus = true;
                    this.actionUrl = `${actionUrl}/${book.id}`;
                    $('#modal-default').modal();
                },
                // hapusData
                hapusData(id) {
                    if (confirm("Anda yakin ingin menghapus data ini?")) {
                    axios.delete(`${actionUrl}/${id}`).then(response => {
                        alert("Data berhasil dihapus!");
                        location.reload();
                    });
                    }
                },
                numberWithSpaces(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            },
            computed: {
                filteredList() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().includes(this.search.toLowerCase());
                    });
                }
            }
        })
    </script>
@endsection
