<div class="container-fluid">
    <div class="alert alert-success">
        <p class="text-center align-middle">
        Berhasil mengedit data barang masuk<br>
           <a href="<?php echo base_url('dashboard/barang_masuk')?>">redirect in 2 second.</a>
        </p>
    </div>
</div>
</div>
<script>
         setTimeout(function(){
            window.location.href = '<?php echo base_url('dashboard/barang_masuk')?>';
         }, 2000);
      </script>