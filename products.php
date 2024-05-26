<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo filemtime('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="fonts/uicons-bold-straight/css/uicons-bold-straight.css" />    
    <title>Товары</title>
</head>

<body class="text-center">
    <?php
    require ('template/header.php');

    require ('template/log_reg_block.php');

    ?>
    <div class="content-line main">
        <div class="content-area">
            <h1 style="text-align: center;">Конструктор букета</h1>
            <?php
            require 'inc/config.inc.php';
            $query_cats = "SELECT * FROM `product_cats`";
            $result_cats = mysqli_query($db, $query_cats);
            $n = 0;
            while($row_cats = $result_cats->fetch_assoc()){
                $n++;
                echo '<h2>' . 'Шаг ' . $n . '. выберите ' . $row_cats['cat_name'] . '</h2>';
                $cat_id = $row_cats['cat_id'];
                $query_cat = "SELECT * FROM `products` WHERE cat_id=$cat_id";
                $result_cat = mysqli_query($db, $query_cat);
                echo  '<ul class="products">';
                while ($row_prod = mysqli_fetch_assoc($result_cat)) {
                    echo '<li class="product" id="' . $row_prod['id'] . '">';
                    echo '<div href="#" class="prod_link img_prod" prod_id="' . $row_prod['id'] . '">';            
                    echo '<img src="product_imgs/' . $row_prod['file'] . '" class="">';
                    ?>
                    <div class="checkbox">
                        <input class="custom-checkbox" type="checkbox" id="check_id_<?php echo $row_prod['id']; ?>" prod_id="<?php echo $row_prod['id'];  ?>" name="<?php echo $row_prod['id'];  ?>">
                        <label for="check_id_<?php echo $row_prod['id'];  ?>"></label>
                    </div>
                    <?php
                    echo '</div>';                    
                    //echo '<div href="#" class="prod_link product_info" prod_id="' . $row_prod['id'] . '">'; 
                    echo '<div href="#" class="product_info" prod_id="' . $row_prod['id'] . '">'; 
                    echo '<h3 class="name_prod">' . $row_prod['name'] . '</h3>';
                    ?>
                    
                    <?php
                    echo '<div class="price_loop">' . $row_prod['price'] . ' &#8381;</div>';
                    ?>
                    <div class="quantity">
                        <button type="button" class="minus">-</button>
                        <label class="screen-reader-text" for="prod_lab_<?php echo $row_prod['id']; ?>"></label>
                        <input type="number" id="prod_lab_<?php echo $row_prod['id']; ?>" class="input-text qty text" name="quantity" value="1" aria-label="Количество товара" size="4" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                        <button type="button" class="plus">+</button>
                    </div>
                        <?php
                        echo '</div>';
                        echo '</li>';
                    }
                    echo  '</ul>';
                }
                ?>
            </div>
        </div>
        <?php
        echo '<div id="zzz">Ntcn</div>';
        require ('template/footer.php');
        ?>
        <script src="js/jQuery-v3.5.1.js"></script>
        <script src="js/products.js?<?php echo filemtime('js/products.js') ?>"></script>
        <script src="js/jquery.cookies.js"></script>
    </body>

    </html>