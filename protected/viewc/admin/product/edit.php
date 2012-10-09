<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $productInstance = $data['productInstance'];
        ?>
        <form action="<?php echo $data['root_url'].'/admin/product/update.html';?>" method="post">
            <input type="hidden" name="id" value="<?php echo $productInstance->id; ?>">
            <input type="hidden" name="version" value="<?php echo $productInstance->version; ?>">
            <input type="hidden" name="parent_id" value="<?php echo $productInstance->parent_id; ?>">
            <table>
                <tr>
                    <td><label for="name">name:</label></td>
                    <td><?php echo $productInstance->name; ?></td>
                </tr>
                <tr>
                    <td><label for="description">description:</label></td>
                    <td><input type="text" name="description" value="<?php echo $productInstance->description; ?>"></td>
                </tr>
                <tr>
                    <td><label for="img_path">img_path:</label></td>
                    <td><input type="text" name="img_path" value="<?php echo $productInstance->img_path; ?>"></td>
                </tr>    
                <tr>
                    <td><input type="submit" value="submit"/></td>
                    <td><a href="<?php echo $data['root_url'].'/admin/product/remove.html?id='.$productInstance->id;?>">remove</a></td>
                </tr> 
            </table>
        </form>   
        
         
    </body>
</html>
