<style type="text/css">
	.log_reg_block {
		position: absolute;
		right: 0;
		top: 0;
		padding: 20px;
		z-index: 9;
	}
	.buttons_lk {
		padding: 5px 10px;
		border-radius: 3px;
		color: #ffffff;
		font-weight: bold;
	}
	.buttons_lk:hover {
		background-color: #00ffdc;
		color: #ffffff;
	}
	.log_link {
		background-color: #008000;    
    	margin-right: 10px;
	}
	.reg_link {
		background-color: #ff0000;
		background-color: #00b9b0;
	}
</style>
<div class="log_reg_block">
<?php 
/* блок кнопок вход/рег, подставляем на страницы */
if(isset($_SESSION['username'])) {
?>
	<a href="#" class="log_link buttons_lk"><?php echo $_SESSION['username']; ?></a><a href="inc/logout.inc.php" class="reg_link buttons_lk">Выйти</a>
<?php 
} else {
?>
	<a href="login.php" class="log_link buttons_lk">Вход</a><a href="register.php" class="reg_link buttons_lk">Регистрация</a>
<?php
}
?>
</div>