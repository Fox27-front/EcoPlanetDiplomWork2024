<?php 
/* получаем id продукта, множитель длины роз и передаем данные для чистки карзины или удаления товара в корзине */
if ( !empty($_POST['mn_roses']) ) {
	$mn_roses = $_POST['mn_roses'];
}
if ( !empty($_POST['f']) ) {
	$f = $_POST['f'];
} else { $f = null; 
}
if ($f == 'delall') {
	//setcookie('shop_php', '', time()-1000, '/');
	/* чистим куки */
	setcookie('shop', '', time()-1000, '/');
} elseif ($f == 'deltek'){
	
}
if ( !empty($_POST['id_prod']) ) {
	$id_prod_del = $_POST['id_prod'];
} else {  
}




require '../inc/config.inc.php'; 
$itg = 0;
$roses = 0;
if (isset($_COOKIE['shop'])) {
	$dec_shop = json_decode($_COOKIE['shop']);
} else {
	$dec_shop = [];
	echo 'Вы не выбрали ни одного товара ';
}
//print_r($_COOKIE);
if ($f == 'deltek') {
	foreach ($dec_shop as $k => $i) {
		$str = (array)$i;
		if ($str['tek_prod_id'] == $id_prod_del) {
			unset($dec_shop[$k]);
		}
	}
	$dec_shop = array_values($dec_shop);	
	$enc_shop =	json_encode($dec_shop);	
	setcookie('shop', $enc_shop, time()+3600*24*365, '/');
	//print_r($dec_shop);
}
if (count($dec_shop) == 0) {
	echo 'Корзина пуста';
}

//echo "<br><br><br>";
//print_r($dec_shop);
//echo "<br><br><br>";

/* разбиваем объект $dec_shop на составляющие и сводим данные и БД с данными из куков */
foreach ($dec_shop as $key => $value) {
	$str = (array)$value;
	$id_prod = $str['tek_prod_id'];
	$kolvo = $str['kolvo'];
	

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
/* Проверяем наличие роз в корзине */
if ( $roses>0 ) {
	?>
	<style>
		.roses_block {
			display: block;
		}
	</style>
	<?php
} else {
	?>
	<style>
		.roses_block {
			display: none;
		}
	</style>
	<?php
}

?>