<?php
//namespace LOGIN;
class Auth{
	private static $raw_salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	private static $algorithm = "2y";
	 ///////
	private static function setCost() {
		$cost = random_int(04, 31);
		$cost = sprintf('%02d', $cost);
		return $cost;
	}
	private static function generatePassword($raw_salt){
		$length = 22;
		$numChars = strlen($raw_salt);
		$string = '';
		for ($i = 0; $i < $length; $i++) {
			$string .= substr($raw_salt, rand(1, $numChars) - 1, 1);
		}
		return $string;
	} 
	private static function setHashPasswordWithSalt($input, $salt, $cost, $algorithm){	
		$dilimiter = "$";
		$saltResult = $dilimiter.$algorithm.$dilimiter.$cost.$dilimiter.$salt.$dilimiter;
		return crypt($input, $saltResult);
	}
	/*
	* 	result method
	 * */
	public static function getPassword($input){
		$cost = self::setCost();
		$stringForSalt = self::generatePassword(self::$raw_salt);
		$hashPasswordWithSalt = self::setHashPasswordWithSalt($input, $stringForSalt, $cost, self::$algorithm);
		return $hashPasswordWithSalt;
	}
}
?>
