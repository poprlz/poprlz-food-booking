<?php

Doo::loadModel('Catalog');
Doo::loadModel('Product');
Doo::loadModel('ProductCatalog');
Doo::loadHelper('DooValidator');
Doo::loadHelper('DooUrlBuilder');
Doo::loadClass('helper/ArrayToModelHelper');
Doo::loadHelper('DooFlashMessenger');
Doo::loadClass('helper/PaginationHelper');

class CatalogProductController extends DooController {

    function index() {
        
        //echo strpos('adddd','dd');

        $catalog=new Catalog();
        $catalogInstance=$catalog->get_catalog($_GET['id']);
        
        $page =1;
        if(isset($_GET['pindex'])){
            $page =$_GET['pindex'];
        }
        
        
        $productCatalog =new ProductCatalog;

        $options['where']="id=".$catalogInstance->id;
        $total =$productCatalog->count($options);
        
        $params= array('id'=>$catalog->id);
        $pager = new PaginationHelper(Doo::conf()->APP_URL . 'index.php//catalog/products.html',$params, $total, 16);
        $pager->paginate($page);
        #change the text of next/prev
        //$pager->prevText = 'prev';
        //$pager->nextText = 'next';
        #If you don't need the next/prev links
        //$pager->noNextPrev();
        #Do the pagination
        

        $limit = $pager->limit;
        //Doo::db()->find('User', array('limit' => $limit));

        //echo $pager->defaultCss;
        //echo $pager->components['prev_link'];
        echo $pager->output;
        //echo $pager->components['jump_menu'];
        //echo $pager->components['page_size'];
    }

}

?>