<?php
 
 Doo::loadHelper('DooValidator');
 Doo::loadHelper('DooUrlBuilder');
 Doo::loadClass('helper/ArrayToModelHelper');
 Doo::loadModel('User');
 class UserController extends DooController{

    public function index(){

         $session = Doo::session();
        if(!isset($session->user_id)){
            Doo::logger()->info('用户还没有登录！');
            $data['auth_error']=array('auth'=>'用户还没有登录，请输入的用户名与密码！');
            $this->renderc('user/index', $data, true);
            return;
        }

        $userInstance=new User();
        
        $userInstance->getById($session->user_id);
           
		 if($userInstance){
            $data['userInstance']=$userInstance;
            $this->renderc('user/user', $data, true);
            return;
        }else{
            $session->user_id=null;
            Doo::logger()->info('用户还没有登录！');
            $data['auth_error']=array('auth'=>'用户还没有登录，请输入的用户名与密码！');
            $this->renderc('user/index', $data, true);
            return;
        }  
 	 
		 
    }

    public function save(){
         $session = Doo::session();
        if(!isset($session->user_id)){
            Doo::logger()->info('用户还没有登录！');
            $data['auth_error']=array('auth'=>'用户还没有登录，请输入的用户名与密码！');
            $this->renderc('user/index', $data, true);
            return;
        }


        $userInstance=new User();
        
        $userInstance->getById($session->user_id);
           
         if($userInstance){
            $arrayToModelHelper=new ArrayToModelHelper();

            $userInstance=$arrayToModelHelper->array_to_model($userInstance,$_POST);
            $userInstance->last_updated=date('Y-m-d H:i:s',time());


            $v = new DooValidator();

         

            if($error = $v->validate($userInstance, $userInstance->getVRules())){


                Doo::logger()->info('用户登录输入的数据验证失败!');
             
                $data['user_save_error']=$error;
                $this->renderc('user/user', $data, true);
                return;
            }

            $result=$userInstance->update();
            $data['message']="用户资料已经成功更新了！";
            $this->renderc('user/user', $data, true);
            return;
        }else{
            $session->user_id=null;
            Doo::logger()->info('用户还没有登录！');
            $data['auth_error']=array('auth'=>'用户还没有登录，请输入的用户名与密码！');
            $this->renderc('user/index', $data, true);
            return;
        }  


          

         
    }


     

     
	
	 

}
?>