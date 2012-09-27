<?php
Doo::loadModel('base/UserAccountBase');
Doo::loadClass('helper/PasswordHelper');
Doo::loadModel('User');


class UserAccount extends UserAccountBase{


	public function register_account($email,$password){
		$userAccountInstance=$this->is_exist_email($email);
		if($userAccountInstance){
			Doo::logger()->info("已经存在email=".$email."登录帐号信息。该邮件不能注册");			
			return false;
		}

		$userInstance=new User();
		$userInstance->version=0;
		 
		$userInstance->token=$this->generate_app_token();
		$userInstance->status='Active'; 
    	$userInstance->date_created=date('Y-m-d H:i:s',time());
    	$userInstance->last_updated=date('Y-m-d H:i:s',time());
    	$userInstance->id=$userInstance->insert();

    	 
    	if($userInstance->id){
    		//echo $userInstance->id;

    		return $this->create_account($email,$password,$userInstance); 

    	}else{
    		Doo::logger()->info("系统错误，创建用户信息失败！");			
			return false;
    	}

	}

	public function create_account($email,$password,User $userInstance,$app='poprlz'){
		$userAccountInstance=$this->is_exist_email($email);
		if($userAccountInstance){
			Doo::logger()->info("已经存在email=".$email."登录帐号信息。该邮件不能注册");			
			return false;
		}

		$userAccountInstance=new UserAccount();
		$userAccountInstance->version=0;
		$userAccountInstance->user_id=$userInstance->id;
		$userAccountInstance->app=$app;
		$userAccountInstance->open_id=uniqid();
		$userAccountInstance->email=$email;
		$userAccountInstance->auth_token=$this->generate_app_token();
		$userAccountInstance->password=$this->generate_mash_password($password,$userAccountInstance->auth_token);
		$userAccountInstance->status='Active'; 
    	$userAccountInstance->date_created=date('Y-m-d H:i:s',time()); 
    	$userAccountInstance->last_updated=date('Y-m-d H:i:s',time());
    	$userAccountInstance->id=$userAccountInstance->insert();

    	if($userAccountInstance->id){
    		 
    		return $userAccountInstance;

    	}else{
    		Doo::logger()->info("系统错误，创建登录帐号信息失败！");			
			return false;
    	}


	}

	public function is_exist_email($email){
		$userAccountInstance=new UserAccount();
		$userAccountInstance->email=$email;
		$opt['limit'] = 1;		 
		$userAccountInstance=$userAccountInstance->find($opt);
		if($userAccountInstance){
			 
			Doo::logger()->info("根据email=".$email."找到登录帐号信息".$userAccountInstance->id."!");
			return $userAccountInstance;			
		}else{
			Doo::logger()->info("根据email=".$email."找不到登录帐号信息。");
			return false;
		}
	}

	public function auth_account($email,$password){

		 	 
		$userAccountInstance=$this->is_exist_email($email);
		var_dump($userAccountInstance);
		if($userAccountInstance){

			$expect_password=$this->generate_mash_password($password,$userAccountInstance->auth_token);

			if($expect_password==$userAccountInstance->password){
				return $userAccountInstance;
			}else{
				Doo::logger()->info("输入的密码不正确。认证失败！");
				return false;
			}
			

			
		}else{
			Doo::logger()->info("根据email=".$email."找不到登录信息。认证失败！");
			return false;
		}
		 

	}
	 

	/**
	*	生成唯一token
	**/
	public function generate_app_token(){
		$passwordHelper=new PasswordHelper();
		$token=$passwordHelper->generate_app_token();
		Doo::logger()->info("生成的token=$token");
		return $token;
	}

	/**
	*
	*/
	public function generate_mash_password($password,$token){
		$passwordHelper=new PasswordHelper($token);
		$mashKey=$this->get_mash_key($token);
		$mash_password=$passwordHelper->generate_mash_password($password,$mashKey);
		return $mash_password;

	}

	private function get_mash_key($token){
		return $token.'poprlz';
	}
}