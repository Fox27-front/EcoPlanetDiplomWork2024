<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo filemtime('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="fonts/uicons-bold-straight/css/uicons-bold-straight.css" />
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/x-icon">
    <title>Оформление заказа</title>
</head>
<body class="text-center">

    <?php
    require ('template/header.php');

    require ('template/log_reg_block.php');

    require 'inc/config.inc.php';

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        $username = '';
    }
    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
    } else {
        $userID = '';
    }

    if($userID != '') {
        $query_users = "SELECT * FROM `users` WHERE id=$userID";
        $result_users = mysqli_query($db, $query_users);
        $email = '';
        while($row_users = $result_users->fetch_assoc()){
        //print_r($row_users);
            $email = $row_users['email'];
        }
    } else {
        $email = '';
    }

    //print_r($result_users);
    ?>
    <div class="title_str"><h1>Оформление заказа</h1></div>
    <div class="line-grad-h"></div>
    <div class="content-line main">
        <div class="content-area">
            <div class="login_block data_user">
                <label class="text-field__label" for="login">Логин</label>
                <input class="text-field__input" type="text" name="login" id="login" placeholder="Логин" value="<?php echo $username; ?>">
            </div>
            <?php
            if($userID == '') {
            ?>
            <div class="login_block data_user">
                <label class="text-field__label" for="password">Пароль</label>
                <input class="text-field__input" type="password" name="password" id="password" placeholder="Пароль" value="">
            </div>
            <?php
            }
            ?>
            <div class="phone_block data_user">
              <label class="text-field__label" for="phone">Телефон</label>
              <input class="text-field__input" type="text" name="phone" id="phone" placeholder="Телефон" value="">
          </div>
          <div class="email_block data_user">
              <label class="text-field__label" for="email">Email</label>
              <input class="text-field__input" type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">
          </div>
          <div class="address_block data_user">
              <label class="text-field__label" for="address">Адрес доставки</label>
              <input class="text-field__input" type="text" name="address" id="address" placeholder="Адрес доставки">
          </div>
          <div class="photo_block data_user">
              <label class="text-field__label" for="photo">Отправить вам фото пред доставкой</label>
              <input class="text-field__input" type="checkbox" name="photo" id="photo" placeholder="Отправить вам фото пред доставкой" value="">
          </div>
          <div class="dop_block data_user">
              <label class="text-field__label" for="poj">Доп. инф.</label>
              <textarea class="textarea-field__input" name="poj" id="poj" placeholder="Дополнительная информация" rows="5" cols="50"></textarea>
          </div>
          <?php
          if (isset($_COOKIE['payment'])) {
            $payment = $_COOKIE['payment'];

            ?>
            <div class="itog_block">
                <div>Сумма заказа: <span class="price_itog"><?php echo $payment; ?></span> ₽</div>
            </div>
            <div class="checkout_button">
                <div><a href="thanks.php" class="button">Подтвердить заказ</a></div>
            </div>
            <?php
        }
        ?>
    </div>

</div>



<?php
require ('template/footer.php');


?>
<script src="js/jQuery-v3.5.1.js"></script>
<script src="js/products.js?<?php echo filemtime('js/products.js') ?>"></script>
<script src="js/jquery.cookies.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.checkout_button .button').click(function() {
            $.removeCookie('shop', { path: '/' });
        });
    });  
</script>
</body>

</html>