<?php
 
class TestController extends DooController{

    public function index(){
		 Doo::loadClass('helper/ArrayToModelHelper');
		 Doo::loadModel('User');
		 $user=new User();

		 $arrayToModelHelper=new ArrayToModelHelper();

		 $arrayToModelHelper->array_to_model($user,array('version'=>23));
		 
    }
    
    public function ckedit(){
        $data=array();
        $this->renderc('/test/index', $data);
    }
	
	 

}
?>