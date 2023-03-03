<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="/build/img/logo1.jpg">
    <script src="//widget.mixcloud.com/media/js/widgetApi.js" type="text/javascript"></script>
    




    <title>DevWebCamp - <?php echo $titulo; ?></title>

    <link rel="stylesheet" href="/build/css/app.css">
</head>
    <body class=raaadio>

    <div class="loader-wrapper">
        <div class="loader">
            <div class="radio loading">
                <div class="loading-text">
                    <span class="loading-text-words">C</span>
                    <span class="loading-text-words">A</span>
                    <span class="loading-text-words">R</span>
                    <span class="loading-text-words">G</span>
                    <span class="loading-text-words">A</span>
                    <span class="loading-text-words">N</span>
                    <span class="loading-text-words">D</span>
                    <span class="loading-text-words">O</span>
                    <span class="loading-text-words"> </span>
                    <span class="loading-text-words">R</span>
                    <span class="loading-text-words">A</span>
                    <span class="loading-text-words">D</span>
                    <span class="loading-text-words">I</span>
                    <span class="loading-text-words">O</span>

                </div>
            </div>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>


        <?php 
            include_once __DIR__ .'/templates/radio-header.php';
            echo $contenido;
            include_once __DIR__ .'/templates/radio-footer.php'; 
        ?>
        <script src="/build/js/main.min.js" defer></script>

        

    </body>
</html>