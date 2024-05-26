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
    <title>Вход</title>
</head>

<body id="body">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-10 col-sm-10 col-10 justify-content-center text-center form-card">
                <!-- LOGIN ARE  -->
                <form action="" method="post" class="form" id="login-form">
                    <h3>Приветствуем</h3>
                    <div class="brandName mb-2">
                        <a href="/"><img src="images/fav-icon.png" alt=""></a>
                    </div>

                    <div class="loginErrorLogs"></div>
                    <div class="form-group">
                        <input type="text" name="uName" id="uName" class="form-control" placeholder="Ваш Логин" data-rule="required" data-msg="Пожалуйста, введите свой Логин">
                        <div class="validation text-left text-danger"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="uPassword" id="uPassword" class="form-control" placeholder="Введите пароль" data-rule="minlen:6" data-msg="Пожалуйста, введите свой пароль">
                        <div class="validation text-left text-danger pwd"></div>
                    </div>

                    <div class="form-group text-left">
                        <input type="checkbox" name="remember" id="remember"> Запомнить меня
                    </div>

                    <button type="submit" class="register btn btn-block" id="login">Войти</button>

                    <div class="link mt-4">
                        <p>Еще не зарегистрировались ? <a href="register.php" id="registerLink">Регистрация</a></p>
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
    <script src="plugin/fontawesome-5.13.1/js/all.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/fontawesome.min.js"></script>
</body>

</html>