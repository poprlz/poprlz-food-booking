<?php
 
 Doo::loadHelper('DooValidator');
 Doo::loadHelper('DooUrlBuilder');
 Doo::loadModel('UserAccount');
 class UserAccountController extends DooController{

    public function index(){

        $redirect_url=null;

        if(isset($_POST['redirect_url'])){
            $redirect_url=$_POST['redirect_url'];
        }else if(isset($_GET['redirect_url'])){
            $redirect_url=$_GET['redirect_url'];
        }else if(isset($_SERVER['HTTP_REFERER'])){
             $redirect_url=$_SERVER['HTTP_REFERER'];
        }

        if($redirect_url){


            $session = Doo::session();
            $session->redirect_url=$redirect_url;

        }


		//$action_url=DooUrlBuilder::url2('UserAccountController','auth_account',null,true);
        //echo $action_url;
        $data['title']='title';
        $data['keywords']='title';
        $data['description']='title';
        $this->renderc('user/index', $data, true);
		 
 	 
		 
    }


    public function auth_account(){
        $v = new DooValidator();

        $validate_rules=array(
            'email'=>array('email','请正确输入邮件地址！'),
            'password'=>array('password',6,200,'密码支持数字，字母与下划线！'),
        );

        if($error = $v->validate($_POST, $validate_rules)){


            Doo::logger()->info('用户登录输入的数据验证失败!');
             
            $data['auth_error']=$error;
            $this->renderc('user/index', $data, true);
            return;
        }

        $email=$_POST['email'];
        $password=$_POST['password'];


         
        $userAccount=new UserAccount();

        
        $userAccountInstance=$userAccount->auth_account($email,$password);

        if($userAccountInstance){
              $session = Doo::session();
              if(isset($session->redirect_url)){
                header('Location: '.$session->redirect_url);
              }else{
                header('Location: '.Doo::conf()->APP_URL.'index.php');
              }

        }else{
            Doo::logger()->info('用户登录输入的输入的用户名与密码不正确！');
            $data['auth_error']=array('password'=>'输入的用户名与密码不正确！');
            $this->renderc('user/index', $data, true);
            return;
        }
         
        
    }


    public function register_account(){


    	
        $v = new DooValidator();

        $validate_rules=array(
            'email'=>array('email','请正确输入邮件地址！'),
            'password'=>array('password',6,200,'密码支持数字，字母与下划线！'),
            'passwordComfirm'=>array('password',6,200,'密码支持数字，字母与下划线！'),
        );

        if($error = $v->validate($_POST, $validate_rules)){


            Doo::logger()->info('用户输入的注册数据验证失败!');
             
            $data['register_error']=$error;
            $this->renderc('user/index', $data, true);
            return;
        }

        $email=$_POST['email'];
        $password=$_POST['password'];
        $passwordComfirm=$_POST['passwordComfirm'];


        if($password!=$passwordComfirm){

            Doo::logger()->info('用户注册输入的两次密码不正确！');
            $data['register_error']=array('password'=>'用户注册输入的两次密码不正确！');
            $this->renderc('user/index', $data, true);
            return;
            
        }

         
        $userAccount=new UserAccount();



        $userAccountInstance=$userAccount->is_exist_email($email);

        if($userAccountInstance){
            Doo::logger()->info('用户注册输入的邮件已经被注册了！');
            $data['register_error']=array('email'=>'用户注册输入的邮件已经被注册了！');
            $this->renderc('user/index', $data, true);
            return;

        }


        $userAccountInstance->register_account($email,$password)

        if($userAccountInstance){
            $session = Doo::session();
            $session->user_id=$userAccountInstance->user_id;
            header('Location: '.Doo::conf()->APP_URL.'index.php/user/user.html');

        }else{
            Doo::logger()->info('用户注册出错！');
            $data['register_error']=array('system'=>'用户注册出错！');
            $this->renderc('user/index', $data, true);
            return; 
        }


    }
	
	 

}
?>