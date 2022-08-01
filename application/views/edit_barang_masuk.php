                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Edit Stok Barang</h1>

                <?php echo form_open_multipart('dashboard/proses_edit_brg_masuk') ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                    <div class="form-group">
                        <?php foreach($masuk as $msk) : ?>
    <label>Tanggal</label>
    <input type="hidden" name="id" value="<?php echo $msk->id?>">
    <input type="date" class="form-control" name="tgl" value="<?php echo $msk->tgl?>">
  </div>

  <div class="form-group">
    <label>Barang</label>
    <input type="text" class="form-control" value="<?php echo $msk->nama ?> <?php echo $msk->merk ?>, Uk. <?php echo $msk->ukuran ?>" readonly>
  </div>

  <div class="form-group">
    <label>Jumlah</label>
    <input type="text" class="form-control" value="<?php echo $msk->jumlah ?>" name="jumlah">
  </div>

  <div class="form-group">
    <label>Keterangan</label>
    <input type="text" class="form-control" value="<?php echo $msk->keterangan ?>" name="keterangan">
  </div>

  <div class="form-group">
      <input type="submit" value="Edit" class="btn btn-primary btn-sm">
  </div>
  <?php endforeach ?>

  <?php echo form_close() ?>

                </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->