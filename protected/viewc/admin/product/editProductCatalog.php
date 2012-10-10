<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>



        <div> 

            <form action="<?php echo $data['root_url'].'/admin/product/saveCatalog.html';?>" method="post">
                <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>"/>
                <?php
                $catalog_id_array = array();
                foreach ($data['productCatalogInstanceList'] as $productCatalogInstance) {
                    $catalog_id_array[] = $productCatalogInstance->catalog_id;
                }
                ?>
                <select name="catalog_id[]" multiple="multiple" size="10">
                    <?php foreach ($data['catalogInstanceList'] as $catalogInstance) { ?>

                        <?php if (in_array($catalogInstance->id, $catalog_id_array)) { ?>
                            <option value="<?php echo $catalogInstance->id; ?>" selected="true"><?php echo $catalogInstance->name; ?></option>
                        <?php } else { ?>    
                            <option value="<?php echo $catalogInstance->id; ?>"><?php echo $catalogInstance->name; ?></option>
                        <?php } ?>   

                    <?php } ?>
                </select>
                
                <input type="submit" value="submit"/>
            </form>        

        </div>    





    </body>
</html>
