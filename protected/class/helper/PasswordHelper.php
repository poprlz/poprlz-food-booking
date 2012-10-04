<?php
class PasswordHelper
{
	
	/**
	*	生成唯一token
	**/
	public function generate_app_token(){
		$uuid=uniqid();
		$token=md5($uuid);
		Doo::logger()->info("生成的token=$token");
		return $token;
	}

	/**
	*
	*/
	public function generate_mash_password($password='demo1234',$mashKey='poprlz'){
		$mash_password=md5($password.$mashKey);
		Doo::logger()->info("生成的mash_password=$mash_password");
		return $mash_password;
	}
}
?>