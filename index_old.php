<?php
$host = 'localhost'; 
$db_name = 'arsbd';
$user = 'arsbd'; 
$password = '6Vgm(VmLCkJlcl*L';

$sql_con = mysqli_connect($host, $user, $password, $db_name);

if ($sql_con == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено");
    $query = 'SELECT * FROM `users`';
    $result = mysqli_query($sql_con, $query);
    echo  '<br><br><br>';
      while($row = $result->fetch_assoc()){        
         echo  $row['id'];
         echo  ' - ';
         echo  $row['name'];
         echo  ' ';
         echo  $row['surname'];
         echo  '<br>';
      }

    $query_prod = 'SELECT * FROM `product`';
    $result_prod = mysqli_query($sql_con, $query_prod);
    echo  '<br><br><br>';
      while($row_prod = $result_prod->fetch_assoc()){        
         echo  $row_prod['id'];
         echo  '. ';
         echo  $row_prod['name'];
         echo  ' ';
         echo  $row_prod['price'] . 'руб.';
         echo  ' Цвет: ' . $row_prod['color'] . '.';
         echo  '<br>';
      }
      echo  '<br><br><br>';
}


?>
<form method="post" action="do_register.php">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>