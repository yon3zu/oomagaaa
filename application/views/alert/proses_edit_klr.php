<div class="container-fluid">
    <div class="alert alert-success">
        <p class="text-center align-middle">
           Berhasil mengedit data barang keluar<br>
           <a href="<?php echo base_url('dashboard/barang_keluar')?>">redirect in 2 second.</a>
        </p>
    </div>
</div>
</div>
<script>
         setTimeout(function(){
            window.location.href = '<?php echo base_url('dashboard/barang_keluar')?>';
         }, 2000);
      </script>