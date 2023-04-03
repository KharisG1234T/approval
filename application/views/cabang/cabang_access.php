<script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h5>Akses Sebagai : <?= $cabangs['nama_cabang']; ?></h5>
    <div class="col-lg-7">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="card col-lg-7 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('cabang/index') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                                <tr>
                                <th>#</th>
                                <th>Area Terdaftar</th>
                                <th>Access</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach($areas as $ar) : ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?= $ar['area']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= check_area($cabangs['id_cabang'], $ar['id']); ?> data-cabang="<?= $cabangs['id_cabang']; ?>" data-area="<?= $ar['id']; ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php $index++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->