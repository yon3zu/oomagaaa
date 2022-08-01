                <!-- Begin Page Content -->
                <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Notes</h1>
                
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Catatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Catatan</th>
                                            <th>Ditulis Oleh</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot> 
                                        <tr>
                                            <th>No</th>
                                            <th>Catatan</th>
                                            <th>Ditulis Oleh</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                        foreach($notes as $nts) : ?>
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
    swal("Berhasil menghapus catatan!", {
      icon: "success",
    }).then(okay => {
   if (okay) {
    window.location.href = "<?php echo base_url('dashboard/delete_notes/'.$nts->id)?>";
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
                                            <td><?php echo $nts->contents ?></td>
                                            <td><?php echo $nts->admin ?></td>
                                            <td><?php echo $nts->tgl ?></td>
                                            <td><center><button class="btn btn-danger btn-sm" onclick="del()"><i class="fa fa-trash"></i> Delete</button></center></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open_multipart('dashboard/post_notes') ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                    <div class="form-group">
    <label>Tambah Notes</label>
    <textarea class="form-control" name="contents" placeholder="Catatan.." required></textarea>
  </div>

  <div class="form-group">
    <label>Ditulis Oleh</label>
    <input type="text" class="form-control" value="<?php echo $this->session->userdata('name')?>" name="admin" readonly>
    <input type="hidden" name="status" value="aktif">
  </div>

  <div class="form-group">
      <input type="submit" value="Add notes" class="btn btn-primary btn-sm">
  </div>

  <?php echo form_close() ?>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->