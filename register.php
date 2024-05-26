<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/all.min.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/fontawesome.min.css">

    <title>Форма регистрации</title>
</head>

<body id="body">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-10 col-sm-10 col-10 justify-content-center text-center form-card">
                <!-- REGISTER AREA  -->
                <form action="" method="post" class="form" id="register-form">
                    <h3>Регистрация</h3>
                    <div class="brandName mb-2">
                        <a href="/"><img src="images/fav-icon.png" alt=""></a>
                    </div>
                    <div class="errorLogs"></div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Как к вам обращаться?(Логин)" data-rule="minlen:4" data-msg="Пожалуйста, введите не менее 4 символов">
                        <div class="validation text-left text-danger uName"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" data-rule="email" data-msg="Please enter your email address">
                        <div class="validation text-left text-danger"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Пароль" data-rule="minlen:6" data-msg="Пожалуйста, введите не менее 6 символов">
                        <div class="validation text-left text-danger"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="re_pass" id="re_pass" class="form-control" placeholder="Повтор пароля" data-rule="minlen:6" data-msg="Пожалуйста, введите не менее 6 символов">
                        <div class="validation text-left text-danger pwd-retype"></div>
                    </div>

                    <button type="submit" class="register btn btn-block" id="register">Регистрация</button>

                    <div class="link mt-4">
                        <p>Уже зарегистрированы ? <a href="login.php" id="loginLink">Вход </a></p>
                    </div>
                </form>
            </div>
            </row>
        </div>
    </div>




    <script src="js/jQuery-v3.5.1.js"></script>
    <script src="js/main.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/all.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/fontawesome.min.js"></script>
</body>

</html>