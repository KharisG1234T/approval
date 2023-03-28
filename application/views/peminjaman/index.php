<script>
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?php if ($this->session->flashdata('message')) { ?>
    <?= $this->session->flashdata('message'); ?>
  <?php } ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left"><?= $title; ?></h6>

      <h6 class="m-0 font-weight-bold text-primary float-right"><a href="<?= site_url('/peminjaman/add')?>"><i class="fas fa-plus"></i> Tambah Peminjaman</a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Peminjam</th>
              <th>Nama Cabang</th>
              <th>Peminjaman Dari</th>
              <th>Tanggal</th>
              <th>Closing Date</th>
              <th>Catatan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($peminjaman) > 0) { ?>
              <?php foreach ($peminjaman as $key => $item) : ?>
                <tr>
                  <td><?= $key + 1; ?></td>
                  <td><?= $item['name']; ?></td>
                  <td><?= $item['nama_cabang']; ?></td>
                  <td><?= $item['from']; ?></td>
                  <td><?= $item['date']; ?></td>
                  <td><?= $item['closingdate']; ?></td>
                  <td><?= $item['note']; ?></td>
                  <td>
                    <a class="badge badge-primary" style="font-size:14px;" href="<?= site_url('peminjaman/detail/' . $item['id_peminjaman']); ?>">Detail</a>
                    <a class="badge badge-success" style="font-size:14px;" href="<?= site_url('peminjaman/edit/' . $item['id_peminjaman']); ?>">Perbarui</a>
                    <a class="badge badge-danger" style="font-size:14px;" href="#!" onclick="deleteConfirm('<?= site_url('peminjaman/delete/' . $item['id_peminjaman']); ?>')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php } else { ?>
              <tr>
                <td colspan="8" class="text-center">Data Peminjaman Masih Kosong</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yg dihapus tidak dapat dipulihkan !</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>