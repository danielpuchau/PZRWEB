<!-- <h2 class="nombre-pagina"><?php echo $titulo; ?></h2> -->

<!-- <button class="boton1" id="boton1">Mostar Artistas</button>
<button class="boton2" id="boton2">Mostar Releases</button> -->

<div class="cartela">
  
 <!--  <a href="#/releases" class="scrolling">Daft Kant - Nuevo Disco en el aire nenos - Escuchalo aquí</a>      
  <a href="/radio" class="scrolling">Nuevo programa de Radio Disponible - Primer programa del año en dublub.es</a>
  <a href="#/releases" class="scrolling">Daft Kant - Nuevo Disco en el aire nenos - Escuchalo aquí</a>     
  <a href="/radio" class="scrolling">Nuevo programa de Radio Disponible - Primer programa del año en dublub.es</a>
 -->

  <?php foreach($cartelas as $cartela) { ?>
      <a href="<?php echo $cartela->enlace; ?>" class="scrolling"><?php echo $cartela->noticia; ?></a>                   
  <?php } ?>

</div>
<div class="ventana__principal">

  
    
</div>





<?php
    $script = '<script src="build/js/lista.js"></script>'
?>