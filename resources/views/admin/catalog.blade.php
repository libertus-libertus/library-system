@extends('layouts.admin')
@section('title', 'Katalog')

@section('css')
  <!-- DataTable -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
  <div id="controller">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="#" @click="tambahData()" class="btn btn-primary btn-xs btn-flat">
              <i class="fa fa-plus-circle"> Tambah Katalog</i>
            </a>
          </div>

          <div class="card-body">
            <table id="datatable" class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Katalog</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
            <div class="modal-header">
              <h4 class="modal-title">Katalog</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf
              <input type="hidden" name="_method" value="put" v-if="editStatus">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Katalog"
                  :value="data.name" autofocus required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-xs btn-flat" data-dismiss="modal">Batal</button>
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
  <!-- DataTable -->
  <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script type="text/javascript">
    var actionUrl = '{{ url('catalog') }}';
    var apiUrl = '{{ url('api/catalog') }}';

    var columns = [
        { data: 'DT_RowIndex', class: 'text-center', orderable: true },
        { data: 'name', class: 'text-left', orderable: false },
        { render: function( index, row, data, meta ) {
          return `
                <a href="#" class="btn btn-warning btn-xs btn-flat" onclick="controller.ubahData(event, ${meta.row})">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-xs btn-flat" onclick="controller.hapusData(event, ${data.id})">
                    <i class="fa fa-times"></i>
                </a>
            `
        }, orderable: false, width: '200px', class: 'text-center' },
    ];
  </script>
  <script src="{{ asset('js/data.js') }}"></script>

@endsection
