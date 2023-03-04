<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Artista</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Artista"
            value="<?php echo $colaborador->nombre ?? ''; ?>"
        >
    </div>


    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción colaborador"
            rows="8"
        ><?php echo $colaborador->descripcion; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
        >
    </div>

    <?php if(isset($colaborador->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/coronas/' . $colaborador->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/coronas/' . $colaborador->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/coronas/' . $colaborador->imagen; ?>.png" alt="Imagen Programa">
            </picture>
        </div>

    <?php } ?>


    <div class="formulario__campo">
        <label for="imagen2" class="formulario__label">Imagen Peña</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen2"
            name="imagen2"
        >
    </div>

    <?php if(isset($colaborador->imagen_actual2)) { ?>
        <p class="formulario__texto">Imagen Peña Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/coronas/' . $colaborador->imagen2; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/coronas/' . $colaborador->imagen2; ?>.jpg" type="image/jpg">
                <img src="<?php echo $_ENV['HOST'] . '/img/coronas/' . $colaborador->imagen2; ?>.jpg" alt="Imagen Programa">
            </picture>
        </div>

    <?php } ?>

</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="instagram"
                placeholder="Instagram"
                value="<?php echo $colaborador->instagram ?? ''; ?>"
            >
        </div>
    </div>


    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="personalWeb"
                placeholder="lil"
                value="<?php echo $colaborador->personalWeb ?? ''; ?>"
            >
        </div>  
    </div>





</fieldset>