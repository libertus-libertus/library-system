var controller = new Vue({
    // variables
    el: '#controller',
    data: {
      datas: [],
      data: {},
      actionUrl,
      apiUrl,
      editStatus: false,
    },
    mounted: function() {
      // reload pertama dari hasil rendering data
      this.datatable();
    },
    // operasi CRUD authuor
    methods: {
      // merender data di datatable
      datatable() {
          const _this = this;
          _this.table = $('#datatable').DataTable({
              ajax: {
                  url: _this.apiUrl,
                  type: 'get',
              },
              columns
          }).on('xhr', function () {
              _this.datas = _this.table.ajax.json().data;
          });
      },
      tambahData() {
        this.data = {};
        this.editStatus = false;
        $('#modal-default').modal();
      },
      ubahData(event, row) {
        this.data = this.datas[row];
        this.editStatus = true;
        $('#modal-default').modal();
      },
      hapusData(event, id) {
        if (confirm("Anda yakin ingin menghapus data ini?")) {
          $(event.target).parents('tr').remove();
          axios.post(this.actionUrl + '/' + id, {_method: 'delete'}).then(response => {
            alert("Data berhasil dihapus!");
            location.reload();
          });
        }
      },

      // data tanpa reload
      submitForm(event, id) {
          event.preventDefault();
          const _this = this;
          var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
          axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
              $('#modal-default').modal('hide');
              _this.table.ajax.reload();
          });
      }
    }
  });
