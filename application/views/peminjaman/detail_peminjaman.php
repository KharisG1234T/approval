<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="text-center">
              <h3 class="">DETAIL PEMINJAMAN DATA PUSAT</h3>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="card-body">
              <div class="form-group row ">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <select class="form-control" id="direction" name="direction" readonly>
                      <option value="<?= $peminjaman['id_cabang'] ?>"><?= $peminjaman['nama_cabang'] ?></option>
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
                    <input type="text" class="form-control" name="from" id="from" placeholder="Dari" readonly value="<?= $peminjaman['from'] ?>">
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
                    <table class="table table-bordered" id="dynamic">
                      <thead>
                        <tr>
                          <td>Nomor</td>
                          <td>SKU</td>
                          <td>Nama Barang</td>
                          <td>Jumlah</td>
                          <td>Harga Satuan</td>
                          <td>Total Harga</td>
                          <td>Stok/PO</td>
                          <td>Maks Delivery</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0 ?>
                        <?php foreach ($peminjaman['barangpeminjaman'] as $key => $barang) { ?>
                          <?php $total = $total + $barang['jumlah'] ?>
                          <tr>
                            <td><label>No.<?= $key + 1 ?></label></td>
                            <td><input type="text" placeholder="SKU" class="form-control" readonly value="<?= $barang['sku'] ? $barang['sku'] : "-" ?>"></td>
                            <td><input type="text" placeholder="Nama Barang" class="form-control" readonly value="<?= $barang['nama'] ?>"></td>
                            <td><input type="number" placeholder="QTY" class="form-control" readonly value="<?= $barang['qty'] ?>"></td>
                            <td><input type="number" placeholder="Harga Satuan" class="form-control" readonly value="<?= $barang['harga'] ?>"></td>
                            <td><input type="number" placeholder="Total" class="form-control" readonly value="<?= $barang['jumlah'] ?>"></td>
                            <td><input type="text" placeholder="Stok/PO" class="form-control" readonly value="<?= $barang['stok_po'] ? $barang['stok_po'] : "-" ?>"></td>
                            <td><input type="date" placeholder="Maks Delivery" class="form-control date" readonly value="<?= $barang['maks_delivery'] ?>"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4" class="text-center font-weight-bold">Total</td>
                          <td colspan="4" class="font-weight-bold text-center">Rp. <?= $total ?></td>
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
                    <input type="date" class="form-control" name="closingdate" id="closingdate" placeholder="Tanggal maksimal closing" readonly value="<?= $peminjaman['closingdate'] ?>">
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <label for='note'>Note</label>
                    <input type="text" class="form-control" name="note" id="note" placeholder="catatan" readonly value="<?= $peminjaman['note'] ?>">
                  </div>
                </div>
              </div>
              <div class="row mt-5">
                <input type="hidden" name="" id="url_peminjaman" value="<?= base_url('peminjaman') ?>">
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-warning mr-3" data-dismiss="modal">Kembali</a>
              </div>
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