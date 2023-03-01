<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/tracks/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Track
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($tracks)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Referencia</th>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Artista</th>
                    <th scope="col" class="table__th">Referencia</th>
                    <th scope="col" class="table__th">Duracion</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($tracks as $track) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $track->posicion; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $track->titulo; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $track->artista->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $track->release->titulo; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $track->duracion; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/tracks/editar?id=<?php echo $track->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/tracks/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $track->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No Hay tracks Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>