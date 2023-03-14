<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Status Pengaduan</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Judul Laporan</th>
                                    <th>Jenis Laporan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status Laporan</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach($reports as $r) : ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?= $r->name; ?></td>
                                <td><?= $r->nik; ?></td>
                                <td><?= $r->title; ?></td>
                                <td><?= $r->type; ?></td>
                                <td><?= date('d F Y' , $r->date_reported); ?></td>
                                <td><?= $r->status; ?></td>
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
