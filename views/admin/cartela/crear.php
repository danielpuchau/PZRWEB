<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/colaboradores">
        <i class="fa-solid fa-circle-plus"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">
    <?php 
        include_once __DIR__ . './../../templates/alertas.php';
    ?>

    <form method="POST" action="/admin/colaboradores/crear" enctype="multipart/form-data" class="formulario">
        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Artista">
    </form>
</div>