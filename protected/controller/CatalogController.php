<?php

Doo::loadModel('Catalog');
Doo::loadHelper('DooValidator');
Doo::loadHelper('DooUrlBuilder');
Doo::loadClass('helper/ArrayToModelHelper');
Doo::loadHelper('DooFlashMessenger');

class CatalogController extends DooController {

    function index() {
        
        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';
        
        $catalogInstance = new Catalog();        

        $catalogInstanceList = $catalogInstance->index_all_catalog();
        $data['catalogInstanceList']=$catalogInstanceList;
        $this->renderc('/admin/catalog/list', $data);
       
         
          
         


        //echo $this->toJSON($catalogInstanceList);

        //echo $this->toXML($catalogInstanceList);
    }

    function create() {

        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';

        //Doo::logger()->debug("创建新的目录,参数为：".  implode(",", $_GET));
        $parent_id = 0;
        if (isset($_GET['parent_id'])) {
            $parent_id = $_GET['parent_id'];
        }


        $catalogInstance = new Catalog;

        $catalogInstance->parent_id = $parent_id;



        $data['catalogInstance'] = $catalogInstance;

        $this->renderc('/admin/catalog/create', $data);
    }

    function edit() {
        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';
       $catalogInstance = new Catalog;
       
       $option=array('where'=>'id='.$_GET['id']);
       
       $catalogInstance=$catalogInstance->getOne($option);
       //var_dump($catalogInstance);

        



        $data['catalogInstance'] = $catalogInstance;

        $this->renderc('/admin/catalog/edit', $data);
    }

    function remove() {
         $message=new DooFlashMessenger();
        $option=array('where'=>'id='.$_GET['id']);
         
        $catalogInstance = new Catalog;   
       
       
        $catalogInstance->delete($option);
       
        $message->addMessage("已经成功删除目录信息");
        $url=Doo::conf()->APP_URL . 'index.php/admin/catalog/index.html';
        header('Location:'.$url);
        return;
    }

    function save() {

        $message=new DooFlashMessenger();
        
        

        $catalogInstance = new Catalog;

        $arrayToModelHelper = new ArrayToModelHelper();

        $catalogInstance = $arrayToModelHelper->array_to_model($catalogInstance, $_POST);



        $v = new DooValidator();




        $data['catalogInstance'] = $catalogInstance;

        $v = new DooValidator();

      /**
        if ($error = $v->validate($catalogInstance, $catalogInstance->getVRules())) {


            Doo::logger()->info('用户登录输入的数据验证失败!');
            
            foreach ($error as $errorMessage){
                $message->addMessage($errorMessage);

            }
            
            $data['message'] = $message;
            $this->renderc('/admin/catalog/create', $data);
            return;
        }
        **/
        $catalogInstance->status = 'active';
        $catalogInstance->date_created = date('Y-m-d H:i:s', time());
        $catalogInstance->last_updated = date('Y-m-d H:i:s', time());
        $catalogInstance->insert();
        $catalogInstance->id=$catalogInstance->lastInsertId();
        
        $message->addMessage("已经成功保存目录信息");
        $url=Doo::conf()->APP_URL . 'index.php/admin/catalog/edit.html?id='.$catalogInstance->id;
        header('Location:'.$url);
        return;
    }

    function update() {
        $message=new DooFlashMessenger();
        
        

      $option=array('where'=>'id='.$_POST['id']);
       
         $catalogInstance = new Catalog;
       
       
       
       $catalogInstance=$catalogInstance->getOne($option);

        $arrayToModelHelper = new ArrayToModelHelper();

        $catalogInstance = $arrayToModelHelper->array_to_model($catalogInstance, $_POST);



        $v = new DooValidator();




        

        $v = new DooValidator();

      /**
        if ($error = $v->validate($catalogInstance, $catalogInstance->getVRules())) {


            Doo::logger()->info('用户登录输入的数据验证失败!');
            
            foreach ($error as $errorMessage){
                $message->addMessage($errorMessage);

            }
            
            $data['message'] = $message;
            $this->renderc('/admin/catalog/create', $data);
            return;
        }
        **/

        $catalogInstance->last_updated = date('Y-m-d H:i:s', time());
        $catalogInstance->update();

        $data['catalogInstance'] = $catalogInstance;
        $message->addMessage("已经成功保存目录信息");
        $url=Doo::conf()->APP_URL . 'index.php/admin/catalog/edit.html?id='.$catalogInstance->id;
        header('Location:'.$url);
        return;
    }

}

?>