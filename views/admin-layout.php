<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PZRWEB - <?php echo $titulo; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="/build/img/logo1.jpg">
    <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="dashboard">
        <?php 
            include_once __DIR__ .'/templates/admin-header.php';
        ?>
        <div class="dashboard__grid">
            <?php
                include_once __DIR__ .'/templates/admin-sidebar.php';  
            ?>

            <main class="dashboard__contenido">
                <?php 
                    echo $contenido; 
                    include_once __DIR__ .'/templates/footer.php'; 
                    
                ?> 
            </main>
        </div>

    <script src="/build/js/main.min.js" defer></script>
</body>
</html>