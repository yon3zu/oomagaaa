                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Stok Barang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Barang</h6>
                        </div>
                        <div class="card-body">
                        <button class="btn btn-primary btn-sm float-left" data-target="#stokbarangModal" data-toggle="modal">Tambah Barang</button>
                        <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Ukuran</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Foto</th>
                                            <th>Lokasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot> 
                                        <tr>
                                        <th>No</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Ukuran</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Foto</th>
                                            <th>Lokasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                        foreach($stok as $s) : ?>
                                        <script>
                    function del() {
                        swal({
  title: "Are you sure?",
  text: "Apakah anda yakin ingin menghapus?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("Berhasil menghapus stok barang!", {
      icon: "success",
    }).then(okay => {
   if (okay) {
    window.location.href = "<?php echo base_url('dashboard/delete_stok/'.$s->id_brg.'/'.$s->foto)?>";
  }
});
  } else {
    swal("Dibatalkan!");
  }
});

                    }
                </script>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $s->nama ?></td>
                                            <td><?php echo $s->merk ?></td>
                                            <td><?php echo $s->ukuran ?></td>
                                            <td><?php echo number_format($s->stok) ?></td>
                                            <td><?php echo $s->satuan ?></td>
                                            <td><img src="<?php echo base_url('images/')?><?php echo $s->foto?>" height="120px"></td>
                                            <td><?php echo $s->lokasi ?></td>
                                            <td><button class="btn btn-danger btn-sm" onclick="del()"><i class="fa fa-trash"></i> Delete</button> <?php echo anchor('dashboard/edit_stok/'.$s->id_brg,'<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>') ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<!-- Stok Barang Modal-->
<div class="modal fade" id="stokbarangModal" tabindex="-1" role="dialog" aria-labelledby="stokLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stokLabel">Tambah barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php echo form_open_multipart('dashboard/post_barang') ?>
                    <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" placeholder="Nama..">
  </div>

  <div class="form-group">
    <label>Merk</label>
    <input type="text" name="merk" class="form-control" placeholder="Merk..">
  </div>

  <div class="form-group">
    <label>Ukuran</label>
    <input type="text" name="ukuran" class="form-control" placeholder="Ukuran..">
  </div>

  <div class="form-group">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" placeholder="Stok..">
  </div>

  <div class="form-group">
    <label>Satuan</label>
    <input type="text" name="satuan" class="form-control" placeholder="Satuan..">
  </div>

  <div class="form-group">
    <label>Foto</label></br>
    <input type="file" name="fotopost" class="btn btn-primary">
  </div>

  <div class="form-group">
    <label>Lokasi</label>
    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi..">
  </div>
                                        
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

            </div>
            <!-- End of Main Content -->