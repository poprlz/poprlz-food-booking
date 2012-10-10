<?php

Doo::loadModel('Catalog');
Doo::loadModel('Product');
Doo::loadModel('ProductCatalog');
Doo::loadHelper('DooValidator');
Doo::loadHelper('DooUrlBuilder');
Doo::loadClass('helper/ArrayToModelHelper');
Doo::loadHelper('DooFlashMessenger');

class ProductController extends DooController {

    function index() {

        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';

        $productInstance = new Product();

        $productInstanceList = $productInstance->index_all_product();
        $data['productInstanceList'] = $productInstanceList;
        $this->renderc('/admin/product/list', $data);
    }

    function create() {

        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';

        //Doo::logger()->debug("创建新的目录,参数为：".  implode(",", $_GET));
        $parent_id = 0;
        if (isset($_GET['parent_id'])) {
            $parent_id = $_GET['parent_id'];
        }


        $productInstance = new Product;

        $productInstance->parent_id = $parent_id;



        $data['productInstance'] = $productInstance;

        $this->renderc('/admin/product/create', $data);
    }

    function edit() {
        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';
        $productInstance = new Product;

        $option = array('where' => 'id=' . $_GET['id']);

        $productInstance = $productInstance->getOne($option);






        $data['productInstance'] = $productInstance;

        $this->renderc('/admin/product/edit', $data);
    }

    function remove() {
        $message = new DooFlashMessenger();
        $option = array('where' => 'id=' . $_GET['id']);

        $productInstance = new Product;


        $productInstance->delete($option);

        $message->addMessage("已经成功删除目录信息");
        $url = Doo::conf()->APP_URL . 'index.php/admin/product/index.html';
        header('Location:' . $url);
        return;
    }

    function save() {

        $message = new DooFlashMessenger();



        $productInstance = new Product;

        $arrayToModelHelper = new ArrayToModelHelper();

        $productInstance = $arrayToModelHelper->array_to_model($productInstance, $_POST);



        $v = new DooValidator();




        $data['productInstance'] = $productInstance;

        $v = new DooValidator();

        /**
          if ($error = $v->validate($productInstance, $productInstance->getVRules())) {


          Doo::logger()->info('用户登录输入的数据验证失败!');

          foreach ($error as $errorMessage){
          $message->addMessage($errorMessage);

          }

          $data['message'] = $message;
          $this->renderc('/admin/product/create', $data);
          return;
          }
         * */
        $productInstance->status = 'active';
        $productInstance->date_created = date('Y-m-d H:i:s', time());
        $productInstance->last_updated = date('Y-m-d H:i:s', time());
        $productInstance->insert();
        $productInstance->id = $productInstance->lastInsertId();

        $message->addMessage("已经成功保存目录信息");
        $url = Doo::conf()->APP_URL . 'index.php/admin/product/edit.html?id=' . $productInstance->id;
        header('Location:' . $url);
        return;
    }

    function update() {
        $message = new DooFlashMessenger();



        $option = array('where' => 'id=' . $_POST['id']);

        $productInstance = new Product;



        $productInstance = $productInstance->getOne($option);

        $arrayToModelHelper = new ArrayToModelHelper();

        $productInstance = $arrayToModelHelper->array_to_model($productInstance, $_POST);



        $v = new DooValidator();




        /**
          if ($error = $v->validate($productInstance, $productInstance->getVRules())) {


          Doo::logger()->info('用户登录输入的数据验证失败!');

          foreach ($error as $errorMessage){
          $message->addMessage($errorMessage);

          }

          $data['message'] = $message;
          $this->renderc('/admin/product/create', $data);
          return;
          }
         * */
        $productInstance->last_updated = date('Y-m-d H:i:s', time());
        $productInstance->update();

        $data['productInstance'] = $productInstance;
        $message->addMessage("已经成功保存目录信息");
        $url = Doo::conf()->APP_URL . 'index.php/admin/product/edit.html?id=' . $productInstance->id;
        header('Location:' . $url);
        return;
    }

    public function edit_catalog() {

        $data['root_url'] = Doo::conf()->APP_URL . 'index.php';

        $catalogInstance = new Catalog();

        $catalogInstanceList = $catalogInstance->index_all_catalog();
        $data['catalogInstanceList'] = $catalogInstanceList;
        $data['product_id'] = $_GET['product_id'];
        $productCatalog = new ProductCatalog();
        $options['where'] = 'product_id=' . $_GET['product_id'];
        $productCatalogInstanceList = $productCatalog->find($options);
        $data['productCatalogInstanceList'] = $productCatalogInstanceList;
        $this->renderc('/admin/product/editProductCatalog', $data);
    }

    public function save_catalog() {
        $product_id = $_POST['product_id'];

        if (isset($_POST['catalog_id']) && is_array($_POST['catalog_id'])) {
            $catalog_id_array = $_POST['catalog_id'];
            ProductCatalog::_saveAllProductCatalog($product_id, $catalog_id_array);
        }

        $url = Doo::conf()->APP_URL . 'index.php/admin/product/editCatalog.html?product_id=' . $product_id;
        header('Location:' . $url);
        return;
    }

}

?>