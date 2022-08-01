<div class="container-fluid">
    <div class="alert alert-success">
        <p class="text-center align-middle">
        Berhasil menambahkan data barang keluar<br>
           <a href="<?php echo base_url('dashboard/barang_keluar')?>">redirect in 3 second.</a>
        </p>
    </div>
</div>
</div>
<script>
         setTimeout(function(){
            window.location.href = '<?php echo base_url('dashboard/barang_keluar')?>';
         }, 3000);
      </script>