<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="/build/img/logo1.jpg">
    <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
    <script src="//widget.mixcloud.com/media/js/widgetApi.js" type="text/javascript"></script>
    




    <title>Prinzedom Records - <?php echo $titulo; ?></title>

    <link rel="stylesheet" href="/build/css/app.css">
</head>
    <body>
        <?php 
            include_once __DIR__ .'/templates/header.php';
            echo $contenido;
            include_once __DIR__ .'/templates/footer.php'; 
        ?>
        <script src="/build/js/main.min.js" defer></script>

        

    </body>
</html>