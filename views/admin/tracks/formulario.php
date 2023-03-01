<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información track</legend>

    <div class="formulario__campo">
        <label for="posicion" class="formulario__label">posicion</label>
        <input
            type="text"
            class="formulario__input"
            id="posicion"
            name="posicion"
            placeholder="posicion track"
            value="<?php echo $track->posicion ?? ''; ?>"
        >
    </div>


    <div class="formulario__campo">
        <label for="titulo" class="formulario__label">título</label>
        <input
            type="text"
            class="formulario__input"
            id="titulo"
            name="titulo"
            placeholder="titulo track"
            value="<?php echo $track->titulo ?? ''; ?>"
        >
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
                <option <?php echo ($track->artista_id === $artista->id) ? 'selected' : '' ?> value="<?php echo $artista->id ?>"><?php echo $artista->nombre ?> </option>
            <?php } ?>
        </select>
    </div>    

    <div class="formulario__campo">
        <label for="release" class="formulario__label">release</label>
        <select
            class="formulario__select"
            id="release"
            name="release_id"
        >
            <option value="">- Seleccionar -</option>
            <?php foreach($releases as $release) { ?>
                <option <?php echo ($track->release_id === $release->id) ? 'selected' : '' ?> value="<?php echo $release->id ?>"><?php echo $release->titulo ?> </option>
            <?php } ?>
        </select>
    </div>    


    <div class="formulario__campo">
        <label for="titulo" class="formulario__label">Soundcloud</label>
        <input
            type="text"
            class="formulario__input"
            id="soundcloud"
            name="soundcloud"
            placeholder="soundcloud track"
            value="<?php echo $track->soundcloud ?? ''; ?>"
        >
    </div>

    
</fieldset>

