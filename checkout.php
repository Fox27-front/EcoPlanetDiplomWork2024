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
            $userid = $row_users['id'];
        }
    } else {
        $email = '';
        $userid = '';
    }

    //print_r($result_users);
    ?>
    <div class="title_str"><h1>Оформление заказа</h1></div>
    <div class="line-grad-h"></div>
    <div class="content-line main">
        <div class="content-area">
            <form id="sub_form">
                <div class="login_block data_user">
                    <label class="text-field__label" for="login">Логин<span style="color:#ff0000">*</span></label>
                    <input class="text-field__input" type="text" name="login" id="login" placeholder="Логин" userid="<?php echo $userid; ?>" value="<?php echo $username; ?>">
                </div>
                <?php
                if($userID == '') {
                    ?>
                    <div class="login_block data_user">
                        <label class="text-field__label" for="password">Пароль<span style="color:#ff0000">*</span></label>
                        <input class="text-field__input" type="password" name="password" id="password" placeholder="Пароль" value="">
                    </div>
                    <?php
                }
                ?>
                <div class="phone_block data_user">
                  <label class="text-field__label" for="phone">Телефон<span style="color:#ff0000">*</span></label>
                  <input class="text-field__input" type="text" name="phone" id="phone" placeholder="Телефон" value="">
              </div>
              <div class="email_block data_user">
                  <label class="text-field__label" for="email">Email</label>
                  <input class="text-field__input" type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">
              </div>
              <div class="address_block data_user">
                  <label class="text-field__label" for="address">Адрес доставки<span style="color:#ff0000">*</span></label>
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
          </form>
          <?php
          if (isset($_COOKIE['payment'])) {
            $payment = $_COOKIE['payment'];
        }

        if (isset($_COOKIE['shop'])) {
            $dec_shop = json_decode($_COOKIE['shop']);
        } else {
            $dec_shop = [];
        }

        $arr_buy = [];
        foreach ($dec_shop as $key => $value) {
            $str = (array)$value;
            $arr_buy = array_merge($arr_buy, [$str]);
        }

        $str_prod = '';
        $itg_price = 0;
        foreach ($arr_buy as $key => $value) {
            $tec_prod_id = $value['tek_prod_id'];
            $tec_kolvo = $value['kolvo'];
            $query_prod = "SELECT * FROM `products` WHERE id=$tec_prod_id";
            $result_prod = mysqli_query($db, $query_prod);
            $row_prod = mysqli_fetch_assoc( $result_prod );
            $name = $row_prod['name'];
            $color_id = $row_prod['color_id'];
            $price = $row_prod['price'];
            $pod_itg = $price*$tec_kolvo;
            $itg_price += $pod_itg;

        }
        if (isset($_COOKIE['payment'])) {
            $payment = $_COOKIE['payment'];
        } else {
            $payment = $itg_price;
        }
        
        ?>
        <div class="itog_block">
            <div>Сумма заказа: <span class="price_itog"><?php echo $payment; ?></span> ₽</div>
        </div>
        <div class="checkout_button">
            <div><input type="submit" id="sub_form" class="button" value="Подтвердить заказ"></div>
        </div>
        <div id="mess_insert"></div>
        <?php

        ?>
    </div>

</div>



<?php
require ('template/footer.php');


?>
<script src="js/jQuery-v3.5.1.js"></script>
<script src="js/checkuot.js?<?php echo filemtime('js/checkuot.js') ?>"></script>
<script src="js/products.js?<?php echo filemtime('js/products.js') ?>"></script>
<script src="js/jquery.cookies.js"></script>
<script type="text/javascript">
    //$(document).ready(function(){
       // $('.checkout_button .button').click(function() {
            //$.removeCookie('shop', { path: '/' });
     //   });
    //});  
</script>
</body>

</html>