<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $catalogInstance = $data['catalogInstance'];
        ?>
        <form action="<?php echo $data['root_url'].'/admin/catalog/save.html';?>" method="post">
            <input type="hidden" name="parent_id" value="<?php echo $catalogInstance->parent_id; ?>">
            <table>
                <tr>
                    <td><label for="name">name:</label></td>
                    <td><input type="text" name="name" value="<?php echo $catalogInstance->name; ?>"></td>
                </tr>
                <tr>
                    <td><label for="description">description:</label></td>
                    <td><input type="text" name="description" value="<?php echo $catalogInstance->description; ?>"></td>
                </tr>
                <tr>
                    <td><label for="img_path">img_path:</label></td>
                    <td><input type="text" name="img_path" value="<?php echo $catalogInstance->img_path; ?>"></td>
                </tr>    
                <tr>
                    <td colspan="2"><input type="submit" value="submit"/></td>
                    
                </tr> 
            </table>
            
             
            
            
 

        </form>   
    </body>
</html>
