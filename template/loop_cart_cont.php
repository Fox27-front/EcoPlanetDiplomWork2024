<?php 

if ( !empty($_POST['mn_roses']) ) {
	$mn_roses = $_POST['mn_roses'];
}
if ( !empty($_POST['f']) ) {
	$f = $_POST['f'];
} else { $f = null; 
}
if ($f == 'delall') {
	setcookie('shop_php', '', time()-1000, '/');
} elseif ($f == 'deltek'){
	
}
if ( !empty($_POST['id_prod']) ) {
	$id_prod_del = $_POST['id_prod'];
} else {  
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
print_r($_COOKIE);

require '../inc/config.inc.php'; 
$itg = 0;
$roses = 0;
$arr = getArrayInCookie('shop_php');
echo '<br><br><br>';
print_r(getArrayInCookie('shop_php'));
/*if ($f == 'deltek'){
	foreach ($arr as $key => $item) {
		if ($item['tek_prod_id'] == $id_prod_del) {
			unset($arr[$key]);
		}
	}
	setArrayInCookie('shop_php', $arr);
	setArrayInCookie('shop_php', $arr);
}
echo "<br><br><br>";
print_r($arr);*/
foreach ($arr as $key => $value) {                        
	$id_prod = $value['tek_prod_id'];
	$kolvo = $value['kolvo'];
	$query_prod = "SELECT * FROM `products` WHERE id=$id_prod";
	$result_prod = mysqli_query($db, $query_prod);
	while($row_prods = $result_prod->fetch_assoc()){
		$pod_itg = $kolvo*$row_prods['price'];

		$color_id = $row_prods['color_id'];
		if (!empty($color_id)) {
			$col = "SELECT * FROM  `product_colors` WHERE color_id=$color_id";
			$res_color = mysqli_query($db, $col);
			$id_col_tab = mysqli_fetch_assoc($res_color);
			$name_color = $id_col_tab['color_name'];
		} else {
			$name_color = '';
		}

		?>
		<div class="cart_prod">
			<div class="title_block">
				<h2><?php echo $row_prods['name'] . ' ' . $name_color; if ($row_prods['name'] == 'Розы') { $roses++; $mnoj = $mn_roses;} else { $mnoj = 1;} ?></h2>
			</div>
			<div class="img_prod_cart">
				<img src="product_imgs/<?php echo $row_prods['file']; ?>">
			</div>
			<div class="cart_info">
				<div class="price">Цена: <?php echo $row_prods['price']*$mnoj . ' ₽'; $itg = $itg + $pod_itg; ?></div>
				<div class="quantity">Количество: <?php echo $kolvo; ?></div>
				<div class="quantity">Подитог: <span class="poditog"><?php echo $kolvo*$row_prods['price']*$mnoj; ?></span> ₽</div>
			</div>
			<div class="close_icon" prod_id="<?php echo $row_prods['id'];  ?>"></div>
		</div>

		<?php
	}
}
?>