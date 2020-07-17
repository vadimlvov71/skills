<?php
class Validation{
	
	 ///////
	private static function getValidCharacters($input) {
		if (preg_match('/^([\w\d]+)$/i', $input, $matches)){
			return true;
		}else{
			return false;
		}
	}
	private static function getValidLength($input){
		$length = strlen($input);
		echo "length:: ".$length."<br>";
		if ($length < 8){
			$result = "less";
		}else if($length > 12){
			$result = "too much";
		}else{
			$result = "ok";
		}
		return $result;
	} 
	
	
	public static function getValidation($input){
		$error = [];
		$validCharacters = self::getValidCharacters($input);
		if($validCharacters != true){
			$error[] = "inValidCharacters";
		}
		$validLength = self::getValidLength($input);
		if($validLength != "ok"){
			$error[] = $validLength;
		}
		return $error;
	}
}
?>
