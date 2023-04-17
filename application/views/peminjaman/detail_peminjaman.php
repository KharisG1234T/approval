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
                    <p class="font-weight-bold">Dari : <?= $peminjaman['from_cb'] ?></p>
                  </div>
                </div>
                <div class="col col-sm-6 col-md-4 col-lg-4 col-lg-4 ml-auto">
                  <div class="kosong">
                    <p class="font-weight-bold">Nomor: <?= $peminjaman['number'] ?></p>
                  </div>
                </div>
              </div>
              <div class="form-group row mt-5">
                <div class="col col-11 ml-auto">
                  <p class="font-weight-bold">Dengan ini mengajukan permohonan pemakaian stock barang dari CV. Solusi Arya Prima Pusat berupa :</p>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mr-auto">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic">
                      <thead>
                        <tr>
                          <td class="font-weight-bold">No</td>
                          <td class="font-weight-bold">SKU</td>
                          <td class="font-weight-bold">Nama Barang</td>
                          <td class="font-weight-bold">QTY</td>
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
                            <td><label><?= $key + 1 ?></label></td>
                            <td><?= $barang['sku'] ? $barang['sku'] : "-" ?></td>
                            <td><?= $barang['nama'] ?></td>
                            <td><?= $barang['qty'] ?></td>
                            <td>Rp. <?= number_format($barang['harga'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($barang['jumlah'], 0, ',', '.') ?></td>
                            <td><?= $barang['stok_po'] ? $barang['stok_po'] : "-" ?></td>
                            <td><?= $barang['maks_delivery'] ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="3" class="text-center font-weight-bold">Total</td>
                          <td></td>
                          <td></td>
                          <td class="font-weight-bold">Rp. <?= number_format($total, 0, ',', '.') ?></td>
                          <td colspan="2"></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col col-md-1"></div>
                <div class="col col-sm-12 col-md-10 col-lg-4">
                  <div class="kosong">
                    <p style="border: solid 1px black;">Tanggal Maksimal Closing : <?= $peminjaman['closingdate'] ?></p>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col col-md-1"></div>
                <div class="col col-12 col-md-10">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="text-center font-weight-bold">
                        <tr>
                          <td>Yang Mengajukan</td>
                          <td colspan="5">Menyetujui</td>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <td class="p-0">
                          <p>Sales</p>
                          <img src="<?= base_url('assets/img/profile/ttd/') . $peminjaman['approve']['sales']['ttd'] ?>" class="img-thumbnail" width="200px">
                        </td>
                        <td>
                          <p>PM</p>
                          <img src="<?= base_url('assets/img/profile/ttd/') . $peminjaman['approve']['pm']['ttd'] ?>" class="img-thumbnail" width="200px">
                        </td>
                        <td>
                          <p>Koor Sales</p>
                          <img src="<?= base_url('assets/img/profile/ttd/') . $peminjaman['approve']['ks']['ttd'] ?>" class="img-thumbnail" width="200px">
                        </td>
                        <td>
                          <p>Head Region</p>
                          <img src="<?= base_url('assets/img/profile/ttd/') . $peminjaman['approve']['hr']['ttd'] ?>" class="img-thumbnail" width="200px">
                        </td>
                        <td>
                          <p>Manager Sales</p>
                          <img src="<?= base_url('assets/img/profile/ttd/') . $peminjaman['approve']['ms']['ttd'] ?>" class="img-thumbnail" width="200px">
                        </td>
                        <td>
                          <p>Manger Operasional</p>
                          <img src="<?= base_url('assets/img/profile/ttd/') . $peminjaman['approve']['mo']['ttd'] ?>" class="img-thumbnail" width="200px">
                        </td>
                      </tbody>
                      <tfoot>
                        <td>tgl: <?= $peminjaman['approve']['sales']['createdat'] ?></td>
                        <td>tgl: <?= $peminjaman['approve']['pm']['createdat'] ?></td>
                        <td>tgl: <?= $peminjaman['approve']['ks']['createdat'] ?></td>
                        <td>tgl: <?= $peminjaman['approve']['hr']['createdat']  ?></td>
                        <td>tgl: <?= $peminjaman['approve']['ms']['createdat'] ?></td>
                        <td>tgl: <?= $peminjaman['approve']['mo']['createdat'] ?></td>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col col-md-1"></div>
                <div class="col col-sm-12 col-md-6 col-lg-6">
                  <p class="font-weight-bold" style="background-color: yellow;">Note : <?= $peminjaman['note'] ?></p>
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