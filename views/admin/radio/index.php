<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/radio/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Programa
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($radios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Fecha</th>
                    <th scope="col" class="table__th">Referencia</th>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($radios as $radio) { ?>
                    <tr class="table__tr">
                    <td class="table__td">
                            <?php echo $radio->fecha; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $radio->referencia; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $radio->titulo; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/radio/editar?id=<?php echo $radio->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/radio/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $radio->id; ?>">
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
        <p class="text-center">No Hay Programas Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>