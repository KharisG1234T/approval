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
          <div class="card-body p-5">
            <form id="form" class="form-horizontal">
              <input type="hidden" value="<?= $this->session->userdata('id') ?>" name="userid" id="userid" />
              <div class="form-group row ">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <select class="form-control" id="direction" name="direction" require>
                      <option value="">Pilih Cabang ...</option>
                      <?php foreach ($cabangs as $cabang) { ?>
                        <option value="<?= $cabang['id_cabang'] ?>"><?= $cabang['nama_cabang'] ?></option>
                      <?php } ?>
                    </select>
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
                  <p>Dengan ini mengajukan permohonan pemakaian stock barang dari CV. Solusi Arya Prima Pusat berupa :</p>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mr-auto">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <td>Nomor</td>
                          <td>Nama Barang</td>
                          <td>Jumlah</td>
                          <td>Harga Satuan</td>
                          <td>Total Harga</td>
                          <td>Maks Delivery</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody id="dynamic">
                        <tr class="tb_row">
                          <td><label>No.1</label></td>
                          <td><input type="text" id="name1" placeholder="Nama Barang" class="form-control" required /></td>
                          <td><input type="number" id="qty1" placeholder="QTY" onchange="getTotalFromQty(this)" class="form-control" required /></td>
                          <td><input type="number" id="price1" placeholder="Harga Satuan" onchange="getTotalFromPrice(this)" class="form-control" required /></td>
                          <td><input type="number" id="total1" placeholder="Total" onchange="change()" readonly class="form-control" required /></td>
                          <td><input type="date" id="maks1" placeholder="Maks Delivery" class="form-control date" required /></td>
                          <td><button type="button" id="tambah" class="btn btn- btn-success">Add <i class="fas fa-fw fa-plus"></i></button></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4" class="text-center font-weight-bold">Total</td>
                          <td colspan="3" class="font-weight-bold text-center">Rp. <span id="total"></span> </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <label for='closingdate'>Tanggal closing</label>
                    <input type="date" class="form-control" name="closingdate" id="closingdate" placeholder="Tanggal maksimal closing" required>
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <label for='note'>Note</label>
                    <input type="text" class="form-control" name="note" id="note" placeholder="catatan" required>
                  </div>
                </div>
              </div>
              <div class="form-group row mt-5">
                <input type="hidden" name="" id="url_peminjaman" value="<?= base_url('peminjaman') ?>">
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-danger ml-auto mr-3" data-dismiss="modal">Cancel</a>
                <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
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
  // set total
  function change() {
    let total = 0;
    const tbRow = document.getElementsByClassName("tb_row");
    for (let i = 1; i <= tbRow.length; i++) {
      let data = $(`#total${i}`).val()
      total = total + parseInt(data ? data : 0);
    }
    $('#total').text(total)
  }

  function getTotalFromQty(e) {
    const index = e.id.replace(/qty/, "")
    const qty = e.value;
    const price = $(`#price${index}`).val();
    $(`#total${index}`).val(parseInt(qty ? qty : 0) * parseInt(price ? price : 0))
    change()
  }

  function getTotalFromPrice(e) {
    const index = e.id.replace(/price/, "")
    const price = e.value;
    const qty = $(`#qty${index}`).val();
    $(`#total${index}`).val(parseInt(qty ? qty : 0) * parseInt(price ? price : 0))
    change()
  }

  $(document).ready(function() {
    var no = 1;

    $('#tambah').click(function() {
      no++;
      $('#dynamic').append(`
        <tr id="row${no}" class="tb_row"> 
          <td><label>No.${no}</label></td>  
          <td><input type="text" id="name${no}" placeholder="Nama Barang" class="form-control" required /></td> 
          <td><input type="number" placeholder="QTY" id="qty${no}" onchange="getTotalFromQty(this)" class="form-control" required /></td> 
          <td><input type="number" placeholder="Harga Satuan" id="price${no}"  onchange="getTotalFromPrice(this)" class="form-control" required /></td> 
          <td><input type="number" placeholder="Total" id="total${no}" onchange="change()" readonly class="form-control" required /></td> 
          <td><input type="date" placeholder="Maks Delivery" id="maks${no}" class="form-control date" required /></td> 
          <td> <button type="button" id="${no}" class="btn btn-danger btn_remove">Hapus</button></td>
        </tr>`);
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      no--;
      change()
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

        console.log('barang', barang)
      }

      const direction = $('#direction').val();
      const userId = $('#userid').val()
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
        })
        .done(function(data) {
          const redirectUrl = $('#url_peminjaman').val()
          window.location = `${redirectUrl}`;
        })
    })
  });
</script>