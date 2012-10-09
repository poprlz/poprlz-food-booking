<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>



        <div> 

            <form>
                <select name="product_id" multiple="multiple" size="10">
                    <?php foreach ($data['catalogInstanceList'] as $catalogInstance) { ?>
                    <option value="<?php echo $catalogInstance->id; ?>"><?php echo $catalogInstance->name; ?></option>
                        
                         

                    <?php } ?>
                </select>
            </form>        

        </div>    





    </body>
</html>
