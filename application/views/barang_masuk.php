                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Stok Barang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Barang Masuk</h6>
                        </div>
                        <div class="card-body">
                        <button class="btn btn-primary btn-sm float-right" data-target="#barangmasukModal" data-toggle="modal">Tambah Barang Masuk</button>
                        <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Merk</th>
                                            <th>Ukuran</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot> 
                                        <tr>
                                        <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Merk</th>
                                            <th>Ukuran</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no=1; 
                                        foreach($masuk as $msk) : ?>

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
    swal("Berhasil menghapus barang masuk!", {
      icon: "success",
    }).then(okay => {
   if (okay) {
    window.location.href = "<?php echo base_url('dashboard/delete_barang_masuk/'.$msk->id)?>";
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
                                            <td><?php echo $msk->nama ?></td>
                                            <td><?php echo $msk->merk ?></td>
                                            <td><?php echo $msk->ukuran ?></td>
                                            <td><?php echo $msk->jumlah ?></td>
                                            <td><?php echo $msk->tgl ?></td>
                                            <td><?php echo $msk->keterangan ?></td>
                                            <td><button class="btn btn-danger btn-sm" onclick="del()"><i class="fa fa-trash"></i> Delete</button> <?php echo anchor('dashboard/edit_brg_masuk/'.$msk->id,'<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>') ?></td>
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
<div class="modal fade" id="barangmasukModal" tabindex="-1" role="dialog" aria-labelledby="stokLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stokLabel">Tambah Barang Masuk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php echo form_open_multipart('dashboard/post_barang_masuk') ?>
                    <div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tgl" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Nama Barang</label>
    <select name="id_brg" class="form-control">
        <?php foreach($stok as $s): ?>
    <option value="<?php echo $s->id_brg?>"><?php echo $s->nama?> <?php echo $s->merk?>, Uk. <?php echo $s->ukuran?></option>
    <?php endforeach ?>
  </select>
  </div>

  <div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control" placeholder="Qty">
  </div>

  <div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
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