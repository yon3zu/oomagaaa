                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Edit Stok Barang</h1>

                <?php echo form_open_multipart('dashboard/prosesEditStok') ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                    <div class="form-group">
                        <?php foreach($stok as $s) : ?>
    <label>Nama</label>
    <input type="hidden" name="id_brg" value="<?php echo $s->id_brg?>">
    <input type="text" class="form-control" name="nama" value="<?php echo $s->nama?>">
  </div>

  <div class="form-group">
    <label>Merk</label>
    <input type="text" class="form-control" value="<?php echo $s->merk ?>" name="merk">
  </div>

  <div class="form-group">
    <label>Ukuran</label>
    <input type="text" class="form-control" value="<?php echo $s->ukuran ?>" name="ukuran">
  </div>

  <div class="form-group">
    <label>Stok</label>
    <input type="text" class="form-control" value="<?php echo $s->stok ?>" name="stok">
  </div>

  <div class="form-group">
    <label>Satuan</label>
    <input type="text" class="form-control" value="<?php echo $s->satuan ?>" name="satuan">
  </div>

  <div class="form-group">
    <label>Satuan</label><br>
    <img src="<?php echo base_url('')?>images/<?php echo $s->foto?>" height="100px">
    <br><br>
    <input type="file" class="btn btn-secondary" name="fotopost">
    <input type="hidden" name="filelama" value="<?php echo $s->foto?>">
  </div>

  <div class="form-group">
    <label>Lokasi</label>
    <input type="text" class="form-control" value="<?php echo $s->lokasi?>" name="lokasi">
  </div>

  <div class="form-group">
      <input type="submit" value="Submit" class="btn btn-primary btn-sm">
  </div>
  <?php endforeach ?>

  <?php echo form_close() ?>

                </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->