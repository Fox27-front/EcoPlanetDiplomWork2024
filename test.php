<script src="js/jQuery-v3.5.1.js"></script>
<script src="js/jquery.cookies.js"></script>
<?php
require 'inc/config.inc.php';

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

print_r($itg_price);

?>
<script type="text/javascript">

</script>
<?php
?>


