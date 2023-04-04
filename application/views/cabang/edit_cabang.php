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
                                <option value="<?php echo $a['id_area']; ?>" <?php echo ($a['id_area'] == $nama_cabang['id_area']) ? 'selected' : ''; ?>>
                                    <?php echo $a['area']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                <!-- btn -->
                <input class="btn btn-success" type="submit" name="btn" value="Perbarui" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Implement Selectize.js -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/selectize.css">
<script src="<?= base_url(); ?>assets/js/angular.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/selectize.min.js"></script>
<script>
  $(document).ready(function () {
    var $select = $('#id_area').selectize({
      valueField: 'id_area',
      labelField: 'area',
      searchField: ['area'],
      options: <?= json_encode($areas); ?>,
      create: true,
      render: {
        option_create: function(data, escape) {
          return '<div class="create">Tambahkan <strong>' + escape(data.input) + '</strong>&hellip;</div>';
        }
      },
      onInitialize: function() {
        // Check if there is already a selected value
        if ('<?= $nama_cabang['id_area']; ?>' !== '') {
          var control = $select[0].selectize;
          control.setValue('<?= $nama_cabang['id_area']; ?>');
        }
      },
      createFilter: function(input) {
        var regexp = new RegExp('^' + $.fn.selectize.escapeRegex(input) + '$', 'i');
        return !regexp.test('<?= implode(',', array_column($areas, 'area')); ?>');
      }
    });
  });
</script>

