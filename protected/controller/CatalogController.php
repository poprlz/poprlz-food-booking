<?php

Doo::loadModel('Catalog');
Doo::loadHelper('DooValidator');
Doo::loadHelper('DooUrlBuilder');

class CatalogController extends DooController {

    function index() {
        $catalogInstance = new Catalog();
        //$catalogInstance->index_children_catalog();


        $catalogInstanceList = $catalogInstance->index_all_catalog();
        echo '<br/>--------------------------------------------------------------------------<br/>';

        foreach ($catalogInstanceList as $var_catalog) {

            echo '<br/>id=' . $var_catalog->id;
            echo '<br/>parent_id=' . $var_catalog->parent_id;
            echo '<br/>name=' . $var_catalog->name;
            echo '<br/>--------------------------------------------------------------------------<br/>';
        }


        echo $this->toJSON($catalogInstanceList);

        echo $this->toXML($catalogInstanceList);
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
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

    function remove() {
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

    function save() {
        
        $parent_id = 0;
        if (isset($_POST['parent_id'])) {
            $parent_id = $_POST['parent_id'];
        }
        
        $catalogInstance = new Catalog;

        $catalogInstance->parent_id = $parent_id;



        $data['catalogInstance'] = $catalogInstance;

        $v = new DooValidator();

        $validate_rules = array(
            'name' => array('email', '请正确输入邮件地址！'),
            'description' => array('description', 6, 200, '密码支持数字，字母与下划线！'),
            'img_path' => array('img_path', 6, 200, '密码支持数字，字母与下划线！'),
        );

        if ($error = $v->validate($_POST, $validate_rules)) {


            Doo::logger()->info('用户登录输入的数据验证失败!');

            $data['form_error'] = $error;
            $this->renderc('user/index', $data, true);
            return;
        }
 
    }

    function update() {
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

}

?>