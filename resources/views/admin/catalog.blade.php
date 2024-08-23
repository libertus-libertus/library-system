@extends('layouts.admin')
@section('title', 'Katalog')

@section('css')

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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Katalog</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($catalogs as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="#" @click="ubahData({{ $item }})" class="btn btn-warning btn-xs btn-flat">
                          <i class="fa fa-edit"> </i>
                        </a>
                        <a href="#" @click="hapusData({{ $item->id }})" class="btn btn-danger btn-xs btn-flat">
                          <i class="fa fa-times"> </i>
                        </a>
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

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <form :action="actionUrl" method="post" autocomplete="off">
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
                <label for="name">Katalog</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama" :value="data.name" autofocus required>
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
  <script type="text/javascript">
    var controller = new Vue({
        // variables
        el: '#controller',
        data: {
            data: {},
            actionUrl: '{{ url("catalog") }}',
            editStatus: false,
        },
        mounted: function() {

        },
        // operasi CRUD authuor
        methods: {
            tambahData() {
                this.data = {};
                this.actionUrl = '{{ url("catalog") }}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            ubahData(data) {
                this.data = data;
                this.actionUrl = '{{ url("catalog") }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            hapusData(id) {
                this.actionUrl = '{{ url("catalog") }}'+'/'+id;
                if(confirm("Anda yakin ingin menghapus data ini?")) {
                    axios.post(this.actionUrl, {_method: 'delete'}).then(response => {
                        location.reload();
                    });
                }
            }
        }
    });
    </script>
@endsection
