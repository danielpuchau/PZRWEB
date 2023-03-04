
<div class="ventana__principal margen-corto">
    <div class="radio__grid">
        <?php foreach($programas as $programa) { ?>
            <div class="radio__programa">
                    
                    <img loading="lazy" src="<?php echo $_ENV['HOST'] . '/img/radio/' . $programa->imagen; ?>.jpg" alt="Imagen Programa" data-url="<?php echo $programa->link?>" data-text="<?php echo $programa->fecha?> - <?php echo $programa->titulo?> ">
                    <div class="radio__overlay">
                        <p class="radio__texto"><?php echo $programa->referencia;?> - <?php echo $programa->titulo;?></p>
                        <p class="radio__inst">pulsa play para escuchar</p>
                        
                    </div>
            </div>
         <?php } ?>
    </div>
</div>
