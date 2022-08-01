<div class="container-fluid">
    <div class="alert alert-success">
        <p class="text-center align-middle">
           Berhasil menambahkan barang<br>
           <a href="<?php echo base_url('dashboard/stok_barang')?>">redirect in 3 second.</a>
        </p>
    </div>
</div>
</div>
<script>
         setTimeout(function(){
            window.location.href = '<?php echo base_url('dashboard/stok_barang')?>';
         }, 3000);
      </script>