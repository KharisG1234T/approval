<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="text-center">
              <h4 class="font-weight-bold">FORM PEMINJAMAN DATA PUSAT</h4>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="card-body">
              <div class="form-group row ">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <p class="font-weight-bold">Kepada : <?= $peminjaman['nama_cabang'] ?></p>
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4 ml-auto">
                  <div class="kosong">
                    <p class="font-weight-bold">Tgl : <?= date_format(date_create($peminjaman['date']), 'd/m/Y') ?></p>
                  </div>
                </div>
              </div>
              <div class="form-group row ">
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4">
                  <div class="kosong">
                    <p class="font-weight-bold">Dari : <?= $peminjaman['from'] ?></p>
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4 ml-auto">
                  <div class="kosong">
                    <p class="font-weight-bold">Nomor: <?= $peminjaman['number'] ?></p>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col col-10 ml-auto">
                  <p class="font-weight-bold">Dengan ini mengajukan permohonan pemakaian stock barang dari CV. Solusi Arya Prima Pusat berupa :</p>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mr-auto">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic">
                      <thead>
                        <tr>
                          <td class="font-weight-bold">Nomor</td>
                          <td class="font-weight-bold">SKU</td>
                          <td class="font-weight-bold">Nama Barang</td>
                          <td class="font-weight-bold">Jumlah</td>
                          <td class="font-weight-bold">Harga Satuan</td>
                          <td class="font-weight-bold">Total Harga</td>
                          <td class="font-weight-bold">Stok/PO</td>
                          <td class="font-weight-bold">Maks Delivery</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0 ?>
                        <?php foreach ($peminjaman['barangpeminjaman'] as $key => $barang) { ?>
                          <?php $total = $total + $barang['jumlah'] ?>
                          <tr>
                            <td><label>No.<?= $key + 1 ?></label></td>
                            <td><?= $barang['sku'] ? $barang['sku'] : "-" ?></td>
                            <td><?= $barang['nama'] ?></td>
                            <td><?= $barang['qty'] ?></td>
                            <td><?= $barang['harga'] ?></td>
                            <td><?= $barang['jumlah'] ?></td>
                            <td><?= $barang['stok_po'] ? $barang['stok_po'] : "-" ?></td>
                            <td><?= $barang['maks_delivery'] ?></td>
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
                    <p class="font-weight-bold" style="background-color: yellow;">Note : <?= $peminjaman['note'] ?></p>
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