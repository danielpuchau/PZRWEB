<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Programa</legend>

    <div class="formulario__campo">
        <label for="referencia" class="formulario__label">referencia</label>
        <input
            type="text"
            class="formulario__input"
            id="referencia"
            name="referencia"
            placeholder="referencia Programa"
            value="<?php echo $radio->referencia ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="titulo" class="formulario__label">titulo</label>
        <input
            type="text"
            class="formulario__input"
            id="titulo"
            name="titulo"
            placeholder="titulo Programa"
            value="<?php echo $radio->titulo ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="fecha" class="formulario__label">fecha</label>
        <input
            type="text"
            class="formulario__input"
            id="fecha"
            name="fecha"
            placeholder="fecha Programa"
            value="<?php echo $radio->fecha ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="link" class="formulario__label">link</label>
        <input
            type="text"
            class="formulario__input"
            id="link"
            name="link"
            placeholder="link Programa"
            value="<?php echo $radio->link ?? ''; ?>"
        >
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

    <?php if(isset($radio->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/radio/' . $radio->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/radio/' . $radio->imagen; ?>.jpg" type="image/jpg">
                <img src="<?php echo $_ENV['HOST'] . '/img/radio/' . $radio->imagen; ?>.jpg" alt="Imagen Programa">
            </picture>
        </div>

    <?php } ?>
    
</fieldset>

