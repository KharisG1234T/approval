<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Form Pengaduan
        </div>

        <div class="card-body">
        	<form action="<?php echo site_url('report/addreport') ?>" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="title">Nama Pelapor*</label>
                    <input class="form-control" type="text" name="name" value="<?= $user['name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nik">ID Pelapor*</label>
                    <input class="form-control"
                    type="text" name="nik" placeholder="Masukan NIK" value="<?= set_value('nik'); ?>">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rt">RT*</label>
                            <input class="form-control"
                            type="number" name="rt" placeholder="RT" value="<?= set_value('rt'); ?>">
                            <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rw">RW*</label>
                            <input class="form-control"
                            type="number" name="rw" placeholder="RW" value="<?= set_value('rw'); ?>">
                            <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="village">Alamat Lengkap*</label>
                            <input class="form-control"
                            type="text" name="village" placeholder="Alamat Sesuai KTP" value="<?= set_value('village'); ?>">
                            <?= form_error('village', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Judul Laporan*</label>
                    <input class="form-control"
                    type="text" name="title" placeholder="Judul Pengaduan Anda" value="<?= set_value('title'); ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Laporan*</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Deskripsikan Pengaduan Anda" rows="3"></textarea>
                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="type">Pilib Jenis Tipe Laporan</label>
                    <select class="form-control" id="type" name="type">
                        <option value="Bantuan Sosial">Bantuan Sosial</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Pembangunan">Pembangunan</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Edukasi">Edukasi</option>
                        <option value="Bencana Alam">Bencana Alam</option>
                        <option value="Narkoba">Narkoba</option>
                        <option value="Aksi Kejahatan">Aksi Kejahatan</option>
                        <option value="Lingkungan Hidup">Lingkungan Hidup</option>
                        <option value="Fasilitas Umum">Fasilitas Umum</option>
                    </select>
                </div>
                <input type="hidden" name="idstatus" value="1"/>
                <div class="form-group">
                <label for="file">Lampiran</label>
                    <input class="form-control-file"
                    type="file" name="file" />
                    <div class="invalid-feedback">
                        <?php echo form_error('file') ?>
                    </div>
                </div>
                <!-- button save -->
                <input class="btn btn-success" type="submit" name="btn" value="Report!" />
            </form>
        </div>

        <div class="card-footer small text-muted">
            Kolom dengan tanda * harus di isi !
        </div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->