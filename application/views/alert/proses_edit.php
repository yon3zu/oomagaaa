<div class="container-fluid">
    <div class="alert alert-success">
        <p class="text-center align-middle">
           Berhasil menambahkan Catatan<br>
           <a href="<?php echo base_url()?>">redirect in 3 second.</a>
        </p>
    </div>
</div>
</div>
<script>
         setTimeout(function(){
            window.location.href = '<?php echo base_url()?>';
         }, 3000);
      </script>