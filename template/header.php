<header class="header">
	<div class="content-line">
		<div class="content-area">
			<div class="logo"><a href="/"><span style="color: green;">Эко</span><span style="color: #ffffff;">планета</span></a></div>
		</div>		
	</div>	
	<div class="content-line menu menu-line">
		<div class="content-area">
			<div class="nav_menu">
				<ul><li><a href="/">Главная</a></li><li><a href="products.php">Конструктор букета</a></li><?php if(isset($_SESSION['userID'])) { if ($_SESSION['userID'] == 1) { echo '<li><a href="/admin_products.php">Админ панель(товары)</a></li>'; }}?><?php if(isset($_SESSION['userID'])) { if ($_SESSION['userID'] == 1) { echo '<li><a href="/admin_zakazy.php">Админ панель(заказы)</a></li>'; }}?></ul>
			</div>
			<div class="cart_block">
				<div class="site-header-cart">
					<a class="cart-content" href="cart.php" title="Посмотреть свою корзину">						
						<span class="count">0</span>
					</a>
				</div>
			</div>
			<div class="check_block">
				<div class="site-header-cart">
					<a class="cart-content" href="checkout.php" title="Оформить заказ">Оформить заказ
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
<?php
/*<img src="/fonts/uicons-bold-straight/svg/fi-bs-shopping-bag.svg">
<img src="/fonts/uicons-bold-straight/svg/fi-bs-shopping-bag.svg">
*/
?>