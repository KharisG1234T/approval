<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-lg-7">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="card col-lg-7 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('cabang') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_cabang" value="<?= $nama_cabang['id_cabang']; ?>" />
                    <!-- edit title -->
                	<div class="form-group">
                		<label for="nama_cabang">Nama Cabang</label>
                		<input class="form-control" type="text" name="nama_cabang" placeholder="Nama Cabang" value="<?= $nama_cabang['nama_cabang'] ?>" />
                	</div>
                    <div class="form-group">
  <label for="id_area">Area Cabang</label>
  <select class="form-control selectize" id="id_area" name="id_area">
    <?php foreach ($areas as $a): ?>
      <option value="<?= $a['id_area'] ?>" <?php if($a['id_area'] == $nama_cabang['id_area']){ echo 'selected'; } ?>>
        <?= $a['area'] ?>
      </option>
    <?php endforeach ?>
  </select>
</div>

<!-- Implement Selectize.js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
<script>
$(document).ready(function () {
  $('#id_area').selectize({
    create: false,
    sortField: 'text',
    searchField: ['text'],
    dropdownParent: 'body'
  });
});
</script>
