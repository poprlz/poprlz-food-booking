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
        <form action="<?php echo $data['root_url'].'/admin/product/save.html';?>" method="post">
            <input type="hidden" name="parent_id" value="<?php echo $productInstance->parent_id; ?>">
            <table>
                <tr>
                    <td><label for="name">name:</label></td>
                    <td><input type="text" name="name" value="<?php echo $productInstance->name; ?>"></td>
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
                    <td colspan="2"><input type="submit" value="submit"/></td>
                    
                </tr> 
            </table>
            
             
            
            
 

        </form>   
    </body>
</html>
