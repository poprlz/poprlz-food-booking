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
                    <a href="<?php echo $data['root_url'].'/admin/catalog/create.html';?>">create</a>
                </li>
            </ul>
        </div>
        
        <div> 
            <table>
                <?php foreach ($data['catalogInstanceList'] as $catalogInstance) {?>
                <tr>
                   
                    <td><?php echo $catalogInstance->name; ?></td>
               
                    <td><?php echo $catalogInstance->description; ?></td>
             
                    <td><?php echo $catalogInstance->img_path; ?></td>
                
                    <td>
                        <a href="<?php echo $data['root_url'].'/admin/catalog/edit.html?id='.$catalogInstance->id;?>">edit</a>
                     
                    </td>
                    
                </tr> 
                 <?php } ?>
            </table>
            
        </div>    
            
            
 

      
    </body>
</html>
