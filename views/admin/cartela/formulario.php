<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Artista</legend>

    <div class="formulario__campo">
        <label for="noticia" class="formulario__label">Noticia</label>
        <input
            type="text"
            class="formulario__input"
            id="noticia"
            name="noticia"
            placeholder="noticia"
            value="<?php echo $cartela->noticia ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="enlace" class="formulario__label">Enlace</label>
        <input
            type="text"
            class="formulario__input"
            id="enlace"
            name="enlace"
            placeholder="enlace"
            value="<?php echo $cartela->enlace ?? ''; ?>"
        >
    </div>


 

</fieldset>


