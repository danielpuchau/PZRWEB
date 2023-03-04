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
            value="<?php echo $artista->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="procedencia" class="formulario__label">Procedencia</label>
        <input
            type="text"
            class="formulario__input"
            id="procedencia"
            name="procedencia"
            placeholder="Procedencia Artista"
            value="<?php echo $artista->procedencia ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">Pais</label>
        <input
            type="text"
            class="formulario__input"
            id="pais"
            name="pais"
            placeholder="Pais Artista"
            value="<?php echo $artista->pais ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción artista"
            rows="8"
        ><?php echo $artista->descripcion; ?></textarea>
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

    <?php if(isset($artista->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/artistas/' . $artista->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/artistas/' . $artista->imagen; ?>.jpg" type="image/jpg">
                <img src="<?php echo $_ENV['HOST'] . '/img/artistas/' . $artista->imagen; ?>.jpg" alt="Imagen Artista">
            </picture>
        </div>

    <?php } ?>
    
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Géneros (separados por coma)</label>
        <input
            type="text"
            class="formulario__input"
            id="tags_input"
            placeholder="Ruock, Punk, Noise, Dub"
        >

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $artista->tags ?? ''; ?>"> 
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

     

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="facebook"
                placeholder="Facebook"
                value="<?php echo $artista->facebook ?? ''; ?>"
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
                name="instagram"
                placeholder="Instagram"
                value="<?php echo $artista->instagram ?? ''; ?>"
            >
        </div>
    </div>



    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="spotify"
                placeholder="Spotify"
                value="<?php echo $artista->spotify ?? ''; ?>"
            >
        </div>
    </div>



    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="bandcamp"
                placeholder="bandcamp"
                value="<?php echo $artista->bandcamp ?? ''; ?>"
            >
        </div>
    </div>

</fieldset>