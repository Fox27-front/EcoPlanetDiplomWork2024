<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo filemtime('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="fonts/uicons-bold-straight/css/uicons-bold-straight.css" />
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/x-icon">
    <title>Корзина</title>
</head>
<body class="text-center">
    <?php
    require ('template/header.php');

    require ('template/log_reg_block.php');

    require 'inc/config.inc.php';

    function setArrayInCookie($nameCookies, $array){
        $value = serialize($array);
        setcookie($nameCookies, $value, time()+3600*24*365);
        return true;
    }
    function getArrayInCookie($nameCookies){
        if(isset($_COOKIE[$nameCookies])){
            $result = unserialize($_COOKIE[$nameCookies]);
        }else{
            $result = false;
        }
        return $result;
    }

    if(!isset($_COOKIE["shop_php"])){
        echo 'Вы не выбрали ни одного товара';   
    } else {
    ?><div class="title_str"><h1>Корзина</h1></div>
    <div class="line-grad-h"></div>
    <div class="content-line main">
        <div class="content-area">
            <div class="cart_prods">
                <?php 
                $itg = 0;
                $roses = 0;
                $arr = getArrayInCookie('shop_php');
                foreach ($arr as $key => $value) {                  
                    $id_prod = $value['tek_prod_id'];
                    $kolvo = $value['kolvo'];
                    $query_prod = "SELECT * FROM `products` WHERE id=$id_prod";
                    $result_prod = mysqli_query($db, $query_prod);
                    while($row_prods = $result_prod->fetch_assoc()){
                        $pod_itg = $kolvo*$row_prods['price'];
                        ?>
                        <div class="cart_prod">
                            <div class="title_block">
                                <h2><?php echo $row_prods['name']; if ($row_prods['name'] == 'Розы') { $roses++;} ?></h2>
                            </div>
                            <div class="img_prod_cart">
                                <img src="product_imgs/<?php echo $row_prods['file']; ?>">
                            </div>
                            <div class="cart_info">
                                <div class="price">Цена: <?php echo $row_prods['price'] . ' ₽'; $itg = $itg + $pod_itg; ?></div>
                                <div class="quantity">Количество: <?php echo $kolvo; ?></div>
                                <div class="quantity">Подитог: <?php echo $kolvo*$row_prods['price']; ?> ₽</div>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
            <?php
            if ( $roses>0 ) {
                   ?>
                   <div class="roses_block">
                    <div style="font-size: 25px;">Длина роз</div>
                    <div class="form_radio_group">
                        <div class="form_radio_group-item">
                            <input id="radio-1" type="radio" name="radio_roses" value="1" checked attr_mnoj="1">
                            <label for="radio-1">40 см</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-2" type="radio" name="radio_roses" value="2" attr_mnoj="1.1">
                            <label for="radio-2">50 см</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-3" type="radio" name="radio_roses" value="3" attr_mnoj="1.2">
                            <label for="radio-3">60 см</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-4" type="radio" name="radio_roses" value="4" attr_mnoj="1.3">
                            <label for="radio-4">70 см</label>
                        </div>
                    </div>
                </div>
            <?php
        } else {
        }

        ?>
        <div class="reset_block">
            <div class="reset_button">Очистить корзину</div>
        </div>
        <div class="itog_block">
            <div>Итог: <span class="price_itog"><?php echo $itg; ?></span> ₽</div>
        </div>
    </div> 
</div> 
</div> 
<?php
}
?>
<?php

/*
    $query_prod = "SELECT id FROM products";
    $result_prod = mysqli_query($db, $query_prod);
*/

    require ('template/footer.php');
    ?>
    <script src="js/jQuery-v3.5.1.js"></script>
    <script src="js/products.js?<?php echo filemtime('js/products.js') ?>"></script>
    <script src="js/jquery.cookies.js"></script>
    <script src="js/cart.js?<?php echo filemtime('js/cart.js') ?>"></script>
</body>

</html>