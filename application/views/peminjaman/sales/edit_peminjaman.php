<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="text-center">
              <h3 class="">FORM EDIT PEMINJAMAN DATA PUSAT</h3>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-5">
            <form id="form" class="form-horizontal">
              <input type="hidden" name="id" id="id" value="<?= $peminjaman['id_peminjaman'] ?>">
              <div class="form-group row ">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <select class="form-control" id="direction" name="direction" required>
                      <option value="">Pilih Cabang ...</option>
                      <?php foreach ($cabangs as $cabang) { ?>
                        <option value="<?= $cabang['id_cabang'] ?>" <?php if ($cabang['id_cabang'] == $peminjaman['id_cabang']) echo ('selected') ?>> <?= $cabang['nama_cabang'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <input type="text" class="form-control" name="date" id="date" placeholder="Tanggal" readonly value="<?= $peminjaman['date'] ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row ">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <input type="text" class="form-control" name="from" id="from" placeholder="Dari" required value="<?= $peminjaman['from'] ?>">
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <input type="text" class="form-control" name="number" id="number" placeholder="Nomor" readonly value="<?= $peminjaman['number'] ?>">
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
                    <!-- data barang -->
                    <input type="hidden" data-barang='<?= json_encode($peminjaman['barangpeminjaman']) ?>' id="barangpeminjaman">
                    <table class="table table-bordered" id="dynamic">
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
                    <input type="date" class="form-control" name="closingdate" id="closingdate" placeholder="Tanggal maksimal closing" required value="<?= $peminjaman['closingdate'] ?>">
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <label for='note'>Note</label>
                    <input type="text" class="form-control" name="note" id="note" placeholder="catatan" required value="<?= $peminjaman['note'] ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row mt-5">
                <input type="hidden" name="" id="url_peminjaman" value="<?= base_url('peminjaman') ?>">
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-danger ml-auto mr-3" data-dismiss="modal">Cancel</a>
                <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
              </div>
              <!-- /.card-body -->
            </form>
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
  // set total step two
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

    const barangPeminjaman = $('#barangpeminjaman');
    const barangs = barangPeminjaman.data('barang');

    // show barans
    barangs.forEach((item, no) => {
      no = no + 1
      $('#dynamic').append(`
        <tr id="row${no}" class="tb_row">
          <td><label>No.${no}</label></td> 
          <td><input type="text" id="name${no}" placeholder="Nama Barang" class="form-control" value="${item.nama}" required />
          </td> <td><input type="number" placeholder="QTY" id="qty${no}" onchange="getTotalFromQty(this)" class="form-control" value="${item.qty}" required /></td> 
          <td><input type="number" placeholder="Harga Satuan" id="price${no}" onchange="getTotalFromPrice(this)" class="form-control" value="${item.harga}" required /></td> 
          <td><input type="number" placeholder="Total" id="total${no}" onchange="change()" readonly class="form-control" value="${item.jumlah}" required /></td> 
          <td><input type="date" placeholder="Maks Delivery" id="maks${no}" class="form-control date" value="${item.maks_delivery}" required /></td> 
          ${(no == 1 ? `<td><button type="button" id="tambah" class="btn btn- btn-success">Add <i class="fas fa-fw fa-plus"></i></button></td>` : `<td> <button type="button" id="${no}" class="btn btn-danger btn_remove">Hapus</button></td>`)}
        </tr>`);
    })

    // add barang
    no = barangs.length;
    $('#tambah').click(function() {
      no++;
      $('#dynamic').append(`
        <tr id="row${no}" class="tb_row"> 
          <td><label>No.${no}</label></td>  
          <td><input type="text" id="name${no}" placeholder="Nama Barang" class="form-control" required /></td> 
          <td><input type="number" placeholder="QTY" id="qty${no}" onchange="getTotalFromQty(this)" class="form-control" required /></td> 
          <td><input type="number" placeholder="Harga Satuan" id="price${no}" onchange="getTotalFromPrice(this)" class="form-control" required /></td> 
          <td><input type="number" placeholder="Total" id="total${no}" onchange="change()" readonly class="form-control" required /></td> 
          <td><input type="date" placeholder="Maks Delivery" id="maks${no}" class="form-control date" required /></td> 
          <td> <button type="button" id="${no}" class="btn btn-danger btn_remove">Hapus</button></td>
        </tr>`);
    });

    // set total step one
    let total = 0;
    const tbRow = document.getElementsByClassName("tb_row");
    for (let i = 1; i <= tbRow.length; i++) {
      let data = $(`#total${i}`).val()
      total = total + parseInt(data ? data : 0);
    }
    $('#total').text(total)


    // remote barang
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      no--;
      change()
    });


    // submit update data
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
      const userId = $('#userid').val()
      const date = $('#date').val()
      const from = $('#from').val()
      const number = $('#number').val()
      const closingDate = $('#closingdate').val()
      const note = $('#note').val()
      const id = $('#id').val()

      const payload = {
        direction,
        userId,
        date,
        from,
        number,
        closingDate,
        note,
        barang,
        id
      }

      $.ajax({
          method: 'POST',
          cache: false,
          data: payload,
          url: '../update',
        })
        .done(function(data) {
          const redirectUrl = $('#url_peminjaman').val()
          window.location = `${redirectUrl}`;
        })
    })
  });
</script>