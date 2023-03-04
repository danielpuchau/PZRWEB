<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/cartela/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Noticia
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($cartela)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Noticia</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($cartela as $cartel) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $cartel->noticia; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/cartela/editar?id=<?php echo $cartel->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/cartela/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $cartel->id; ?>">
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
        <p class="text-center">No Hay Noticias Aún</p>
    <?php } ?>
</div>

