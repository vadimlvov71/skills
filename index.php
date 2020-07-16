<?php 
//include 'Auth.php';
//use \Auth;
require ("config.php");
?>
<!DOCTYPE html>
<html>
	<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo($path)?>/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo($path)?>/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo($path)?>/js/bootstrap.min.js"></script>
</head>
<body>
<?php require ("includes/header.php");?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center">check password</h3>
    </div>
  </div>
</div>

<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$input =  "12345678";
$input2 =  "12345678";
$getPassword = Auth::getPassword($input);
echo "getPassword:::".$getPassword."<br>";
if (password_verify($input2, $getPassword)) {
    echo 'Пароль правильный!<br>';
} else {
    echo 'Пароль неправильный.<br>';
}
?>
<br><br><br><br>
<?php


echo "1111:::    ";
$salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$raw_salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$cost = 12;

///////
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Пароль правильный!<br>';
} else {
    echo 'Пароль неправильный.<br>';
}

$input =  "12345678";
$input2 = "12345678";
//$cost = setCost();
//$stringForSalt = generatePassword($raw_salt);
//$stringForSalt = 1;
$algorithm = "2y";
//$hashPasswordWithSalt = setHashPasswordWithSalt($input, $stringForSalt, $cost, $algorithm);
echo "cost: ".$cost."<br>";
echo "stringForSalt: ".$stringForSalt."<br>";
echo "hashPasswordWithSalt: ".$hashPasswordWithSalt."<br>";
if (password_verify($input2, $hashPasswordWithSalt)) {
    echo 'Пароль правильный!<br>';
} else {
    echo 'Пароль неправильный.<br>';
}

////
/*
function setCost() {
	$cost = random_int(04, 31);
	$cost = sprintf('%02d', $cost);
	return $cost;
}
function generatePassword($raw_salt){
	$length = 22;
	$numChars = strlen($raw_salt);
	$string = '';
	for ($i = 0; $i < $length; $i++) {
		$string .= substr($raw_salt, rand(1, $numChars) - 1, 1);
	}
	return $string;
} 
function setHashPasswordWithSalt($input, $salt, $cost, $algorithm){	
	$dilimiter = "$";
	$saltResult = $dilimiter.$algorithm.$dilimiter.$cost.$dilimiter.$salt.$dilimiter;
	//$salt = '$2a$'.$cost.'$'.$salt.'$';
	return crypt($input, $saltResult);
}
* */
?>
</body>
