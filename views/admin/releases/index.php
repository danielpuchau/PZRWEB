<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/releases/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Releases
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($releases)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Referencia</th>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Artista</th>
                    <th scope="col" class="table__th">Formato</th>
                    <th scope="col" class="table__th">Tipo</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($releases as $release) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $release->referencia; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $release->titulo; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $release->artista->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $release->formato->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $release->tipo->nombre; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/releases/editar?id=<?php echo $release->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/releases/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $release->id; ?>">
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
        <p class="text-center">No Hay Releases Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>