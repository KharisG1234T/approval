<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="text-center">
              <h3 class="">FORM PEMINJAMAN DATA PUSAT</h3>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="form" class="form-horizontal">
              <input type="hidden" value="" name="id" />
              <div class="card-body">
                <div class="form-group row ">
                  <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                    <div class="kosong">
                      <select class="form-control" id="direction" name="direction" require>
                        <option value="">Pilih Cabang ...</option>
                      </select>
                      <input type="hidden" class="form-control" name="user" id="user" value="<?= $this->session->userdata('id_user'); ?>">
                    </div>
                  </div>
                  <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                    <div class="kosong">
                      <input type="text" class="form-control" name="date" id="date" placeholder="Tanggal" readonly value="<?= date('d/m/Y') ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group row ">
                  <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                    <div class="kosong">
                      <input type="text" class="form-control" name="from" id="from" placeholder="Dari" require>
                    </div>
                  </div>
                  <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                    <div class="kosong">
                      <input type="text" class="form-control" name="number" id="number" placeholder="Nomor" readonly value="<?= date('m') ?>/PB/X/<?= date('y') ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col col-10 ml-auto">
                    <p>Dengan ini mengajukan permohonan pemakaian stock barang dari <span id="">XXXXXX-XXXXXX-XXXXXX</span></p>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 mr-auto">
                    <div class="table-responsive">
                      <table class="table" id="dynamic">
                        <tr>
                          <td>Nomor<input type="text" class="form-control" value="No. 1" disabled></td>
                          <td>Nama Barang<input type="text" id="name1" placeholder="Nama Barang" class="form-control" required /></td>
                          <td>Jumlah<input type="number" id="qty1" placeholder="QTY" class="form-control" required /></td>
                          <td>Harga Satuan<input type="number" id="price1" placeholder="Harga Satuan" class="form-control" required /></td>
                          <td>Total Harga<input type="number" id="total1" placeholder="Total" class="form-control" required /></td>
                          <td>Maksimal Delivery<input type="date" id="maks1" placeholder="Maks Delivery" class="form-control date" required /></td>
                          <td> <br><button type="button" id="tambah" class="btn btn-success">Tambah Barang +</button></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                    <div class="kosong">
                      <label for='closingdate'>Tanggal closing</label>
                      <input type="date" class="form-control" name="closingdate" id="closingdate" placeholder="Tanggal maksimal closing">
                    </div>
                  </div>
                  <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                    <div class="kosong">
                      <label for='note'>Note</label>
                      <input type="text" class="form-control" name="note" id="note" placeholder="catatan">
                    </div>
                  </div>
                </div>
                <div class="form-group row mt-5">
                  <input type="hidden" name="" id="url_peminjaman" value="<?= base_url('peminjaman') ?>">
                  <a href="<?= base_url('peminjaman') ?>" class="btn btn-danger ml-auto mr-3" data-dismiss="modal">Cancel</a>
                  <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
  $(document).ready(function() {

    $.ajax({
      type: "GET",
      url: "dropdowncabang",
      cache: false,
      success: function(data) {
        const direction = $("#direction");
        const cabang = JSON.parse(data);
        cabang.forEach(item => {
          $("<option/>", {
            value: item.id_cabang,
            text: item.nama_cabang
          }).appendTo(direction);
        })
        console.log('data', JSON.parse(data));
      }
    });

    var no = 1;

    $('#tambah').click(function() {
      no++;
      $('#dynamic').append('<tr id="row' + no + '"> <td><input type="text" value="No. ' + no + '" class="form-control" readonly></td> <td><input type="text" id="name' + no + '" placeholder="Nama Barang" class="form-control" required /></td> <td><input type="number" placeholder="QTY" id="qty' + no + '" class="form-control" required /></td> <td><input type="number" placeholder="Harga Satuan" id="price' + no + '" class="form-control" required /></td> <td><input type="number" placeholder="Total" id="total' + no + '" class="form-control" required /></td> <td><input type="date" placeholder="Maks Delivery" id="maks' + no + '" class="form-control date" required /></td> <td> <button type="button" id="' + no + '" class="btn btn-danger btn_remove">Hapus</button></td></tr>');
    });


    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      no--;
    });


    $('#form').submit(function(e) {
      e.preventDefault()
      let barang = []

      for (let i = 1; i <= no; i++) {
        let name = $(`#name${i}`).val()
        let qty = $(`#qty${i}`).val()
        let price = $(`#price${i}`).val()
        let total = $(`#total${i}`).val()
        let maks = $(`#maks${i}`).val()

        barang = [...barang, {
          name,
          qty,
          price,
          total,
          maks
        }]
      }

      const direction = $('#direction').val();
      const userId = $('#user').val()
      const date = $('#date').val()
      const from = $('#from').val()
      const number = $('#number').val()
      const closingDate = $('#closingdate').val()
      const note = $('#note').val()

      const payload = {
        direction,
        userId,
        date,
        from,
        number,
        closingDate,
        note,
        barang
      }

      $.ajax({
        method: 'POST',
        cache: false,
        data: payload,
        url: 'insert',
      }).success(function(data) {
        const redirectUrl = $('#url_peminjaman').val()
        window.location = `${redirectUrl}`;

      })
      console.log('payload', payload)
    })
  });
</script>