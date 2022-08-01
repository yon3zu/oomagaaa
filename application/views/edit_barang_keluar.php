                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Edit Stok Barang</h1>

                <?php echo form_open_multipart('dashboard/proses_edit_brg_keluar') ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                    <div class="form-group">
                        <?php foreach($keluar as $klr) : ?>
    <label>Tanggal</label>
    <input type="hidden" name="id" value="<?php echo $klr->id?>">
    <input type="date" class="form-control" name="tgl" value="<?php echo $klr->tgl?>">
  </div>

  <div class="form-group">
    <label>Barang</label>
    <input type="text" class="form-control" value="<?php echo $klr->nama ?> <?php echo $klr->merk ?>, Uk. <?php echo $klr->ukuran ?>" readonly>
  </div>

  <div class="form-group">
    <label>Jumlah</label>
    <input type="text" class="form-control" value="<?php echo $klr->jumlah ?>" name="jumlah">
  </div>

  <div class="form-group">
    <label>Penerima</label>
    <input type="text" class="form-control" value="<?php echo $klr->penerima ?>" name="penerima">
  </div>

  <div class="form-group">
    <label>Keterangan</label>
    <input type="text" class="form-control" value="<?php echo $klr->keterangan ?>" name="keterangan">
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