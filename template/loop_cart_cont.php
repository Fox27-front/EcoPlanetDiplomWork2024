<?php 

if ( !empty($_POST['mn_roses']) ) {
	$mn_roses = $_POST['mn_roses'];
}
if ( !empty($_POST['arr_coocke_front']) ) {
	$arr_coocke_front = $_POST['arr_coocke_front'];
	
} else {
	$arr_coocke_front = [];

}

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

require '../inc/config.inc.php'; 
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
				<h2><?php echo $row_prods['name']; if ($row_prods['name'] == 'Розы') { $roses++; $mnoj = $mn_roses;} else { $mnoj = 1;} ?></h2>
			</div>
			<div class="img_prod_cart">
				<img src="product_imgs/<?php echo $row_prods['file']; ?>">
			</div>
			<div class="cart_info">
				<div class="price">Цена: <?php echo $row_prods['price']*$mnoj . ' ₽'; $itg = $itg + $pod_itg; ?></div>
				<div class="quantity">Количество: <?php echo $kolvo; ?></div>
				<div class="quantity">Подитог: <span class="poditog"><?php echo $kolvo*$row_prods['price']*$mnoj; ?></span> ₽</div>
			</div>
		</div>

		<?php
	}
}
?>