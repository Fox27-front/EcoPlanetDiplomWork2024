<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/all.min.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/fontawesome.min.css">
    <title>Привет <?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} else {} ?></title>
</head>

<body class="text-center">

    <h1 class="mt-5">Привет <?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} else {} ?></h1>
    <a href="inc/logout.inc.php"><button class="btn btn-sm btn-primary mt-4">Выйти</button></a>

    <div class="header_cont">Перейти на <a href="/">Главную</a> или <a href="/products.php">Товары</a><?php if(isset($_SESSION['username'])) { if ($_SESSION['userID'] == 1) { echo ' или <a href="/admin.php">Админка</a>'; }}?></div>

    <script src="js/jQuery-v3.5.1.js"></script>
    <script src="js/main.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/all.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/fontawesome.min.js"></script>
</body>

</html>