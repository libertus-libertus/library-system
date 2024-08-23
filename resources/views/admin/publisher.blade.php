@extends('layouts.admin')
@section('title', 'Publisher')

@section('css')

@endsection

@section('content')
  <div id="controller">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="#" @click="tambahData()" class="btn btn-primary btn-xs btn-flat">
              <i class="fa fa-plus-circle"> Tambah Publisher</i>
            </a>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Nama Publisher</th>
                  <th>Email</th>
                  <th>Nomor Hp</th>
                  <th>Alamat</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($publishers as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->address }}</td>
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
              <h4 class="modal-title">Publisher</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf
              <input type="hidden" name="_method" value="put" v-if="editStatus">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama" :value="data.name" autofocus required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" :value="data.email" required>
              </div>
              <div class="form-group">
                <label for="phone_number">Nomor Hp/Telp</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number"
                  placeholder="Nomor Hp/Telp" :value="data.phone_number" required>
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Alamat" :value="data.address" required>
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
            actionUrl: '{{ url("publisher") }}',
            editStatus: false,
        },
        mounted: function() {

        },
        // operasi CRUD authuor
        methods: {
            tambahData() {
                this.data = {};
                this.actionUrl = '{{ url("publisher") }}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            ubahData(data) {
                this.data = data;
                this.actionUrl = '{{ url("publisher") }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            hapusData(id) {
                this.actionUrl = '{{ url("publisher") }}'+'/'+id;
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
