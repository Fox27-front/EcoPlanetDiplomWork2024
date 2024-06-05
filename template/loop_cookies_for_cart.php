<?php 

//parse_str($_POST['id_prod'], $id_prod);

//$id_prod = $_POST['id_prod'];
//$deist = $_POST['deist'];
//$kolvo = $_POST['kolvo'];

if ( !empty($_POST['arr_coocke_front']) ) {
	$arr_coocke_front = $_POST['arr_coocke_front'];
	
} else {
	$arr_coocke_front = [];

}


//$arr = [];
//$arr[$id_prod] = $kolvo;

print_r($arr_coocke_front);



function setArrayInCookie($nameCookies, $array){
    $value = serialize($array);
    setcookie($nameCookies, $value, time()+3600*24*365, '/');
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
/*
if(!isset($_COOKIE["shop_php"])){
	$arr = [];
	$arr[$id_prod] = $kolvo;	
}else{
	$arr = getArrayInCookie('shop_php');	
	if (array_key_exists($id_prod, $arr)) {
		unset($arr[$id_prod]);
	} else {
		$arr[$id_prod] = $kolvo;
	}
}
*/

setArrayInCookie('shop_php', $arr_coocke_front);

//setArrayInCookie('shop_php', $arr);
//print_r($_COOKIE['shop_php']);
?>