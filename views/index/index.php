


<div class="cartela">
  

  <?php foreach($cartelas as $cartela) { ?>
      <a href="<?php echo $cartela->enlace; ?>" class="scrolling"><?php echo $cartela->noticia; ?></a>                   
  <?php } ?>

</div>
<div class="ventana__principal">

  
    
</div>





<?php
    $script = '<script src="build/js/lista.js"></script>'
?>