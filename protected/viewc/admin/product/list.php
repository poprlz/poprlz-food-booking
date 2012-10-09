<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <div>
            <ul>
                <li>
                    <a href="<?php echo $data['root_url'].'/admin/product/create.html';?>">create</a>
                </li>
            </ul>
        </div>
        
        <div> 
            <table>
                <?php foreach ($data['productInstanceList'] as $productInstance) {?>
                <tr>
                   
                    <td><?php echo $productInstance->name; ?></td>
               
                    <td><?php echo $productInstance->description; ?></td>
             
                    <td><?php echo $productInstance->img_path; ?></td>
                
                    <td>
                        <a href="<?php echo $data['root_url'].'/admin/product/edit.html?id='.$productInstance->id;?>">edit</a>
                     
                    </td>
                    
                </tr> 
                 <?php } ?>
            </table>
            
        </div>    
            
            
 

      
    </body>
</html>
