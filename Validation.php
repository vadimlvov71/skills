<?php
class Validation{
private static $minUsernameLength = 6;
	private static $maxUsernameLength = 12;
	private static $minPasswordLength = 8;
	private static $maxPasswordLength = 12;
	 ///////
	private static function getValidCharacters($input, $type) {
		if (preg_match('/^([\w\d]+)$/i', $input, $matches)){
			return true;
		}else{
			return false;
		}
	}
	private static function getValidLength($input, $type){
		$length = strlen($input);
		echo "length:: ".$length."<br>";
		if($type == "username"){
			$minLength = self::$minUsernameLength;
			$maxLength = self::$maxUsernameLength;
			$errorTextMin = "username must have at least ".$minLength." characters";
			$errorTextMax = "username must have maximum ".$maxLength." characters";
		}else{
			$minLength = self::$minPasswordLength;
			$maxLength = self::$maxPasswordLength;
			$errorTextMin = "password must have at least ".$minLength." characters";
			$errorTextMax = "password must have maximum :".$maxLength." characters";
		}
		if ($length < $minLength){
			$result = $errorTextMin;
		}else if($length > $maxLength){
			$result = $errorTextMax;
		}else{
			$result = "ok";
		}
		return $result;
	} 
	
	
	public static function getValidation($username, $password){
		$error = [];
		$validCharacters = self::getValidCharacters($username, "username");
		if($validCharacters != true){
			$error[] = "usernameIValidCharacters";
		}
		$validCharacters = self::getValidCharacters($password, "password");
		if($validCharacters != true){
			$error[] = "passwordInValidCharacters";
		}
		$validLength = self::getValidLength($username, "username");
		if($validLength != "ok"){
			$error[] = $validLength;
		}
		$validLength = self::getValidLength($password, "password");
		if($validLength != "ok"){
			$error[] = $validLength;
		}
		
		return $error;
	}
}
?>
