<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Release</legend>

    <div class="formulario__campo">
        <label for="referencia" class="formulario__label">referencia</label>
        <input
            type="text"
            class="formulario__input"
            id="referencia"
            name="referencia"
            placeholder="referencia release"
            value="<?php echo $release->referencia ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="titulo" class="formulario__label">título</label>
        <input
            type="text"
            class="formulario__input"
            id="titulo"
            name="titulo"
            placeholder="titulo release"
            value="<?php echo $release->titulo ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="formato" class="formulario__label">Formato</label>
        <select
            class="formulario__select"
            id="formato"
            name="formato_id"
        >
            <option value="">- Seleccionar -</option>
            <?php foreach($formatos as $formato) { ?>
                <option <?php echo ($release->formato_id === $formato->id) ? 'selected' : '' ?> value="<?php echo $formato->id ?>"><?php echo $formato->nombre ?> </option>
            <?php } ?>
        </select>
    </div>    
    

    <div class="formulario__campo">
        <label for="tipo" class="formulario__label">tipo</label>
        <select
            class="formulario__select"
            id="tipo"
            name="tipo_id"
        >
            <option value="">- Seleccionar -</option>
            <?php foreach($tipos as $tipo) { ?>
                <option <?php echo ($release->tipo_id === $tipo->id) ? 'selected' : '' ?> value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?> </option>
            <?php } ?>
        </select>
    </div>    


    <div class="formulario__campo">
        <label for="artista" class="formulario__label">artista</label>
        <select
            class="formulario__select"
            id="artista"
            name="artista_id"
        >
            <option value="">- Seleccionar -</option>
            <?php foreach($artistas as $artista) { ?>
                <option <?php echo ($release->artista_id === $artista->id) ? 'selected' : '' ?> value="<?php echo $artista->id ?>"><?php echo $artista->nombre ?> </option>
            <?php } ?>
        </select>
    </div>    

    <div class="formulario__campo">
        <label for="ano" class="formulario__label">Año</label>
        <input
            type="text"
            class="formulario__input"
            id="ano"
            name="ano"
            placeholder="año release"
            value="<?php echo $release->ano ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción release"
            rows="8"
        ><?php echo $release->descripcion; ?></textarea>
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

    <?php if(isset($release->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/releases/' . $release->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/releases/' . $release->imagen; ?>.jpg" type="image/jpg">
                <img src="<?php echo $_ENV['HOST'] . '/img/releases/' . $release->imagen; ?>.jpg" alt="Imagen release">
            </picture>
        </div>

    <?php } ?>
    

    <div class="formulario__campo">
        <label for="imagen2" class="formulario__label">Imagen2</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen2"
            name="imagen2"
        >
    </div>

    <?php if(isset($release->imagen_actual2)) { ?>
        <p class="formulario__texto">Imagen Actual2:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/releases/' . $release->imagen2; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/releases/' . $release->imagen2; ?>.jpg" type="image/jpg">
                <img src="<?php echo $_ENV['HOST'] . '/img/releases/' . $release->imagen2; ?>.jpg" alt="Imagen release">
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
        <input type="hidden" name="tags" value="<?php echo $release->tags ?? ''; ?>"> 
    </div>


    <div class="formulario__campo">
        <label for="creditos_input" class="formulario__label">Créditos (separados por coma)</label>
        <input
            type="text"
            class="formulario__input"
            id="creditos_input"
            placeholder="Master: lol, artwor:...."
        >

        <div id="creditos" class="formulario__listado"></div>
        <input type="hidden" name="creditos" value="<?php echo $release->creditos ?? ''; ?>"> 
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

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
                value="<?php echo $release->spotify ?? ''; ?>"
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
                value="<?php echo $release->bandcamp ?? ''; ?>"
            >
        </div>
    </div>



    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="soundcloud"
                placeholder="soundcloud"
                value="<?php echo $release->soundcloud ?? ''; ?>"
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
                name="mixcloud"
                placeholder="mixcloud"
                value="<?php echo $release->mixcloud ?? ''; ?>"
            >
        </div>
    </div>



    

</fieldset>