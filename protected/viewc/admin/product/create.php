<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!-- 全局风格CSS -->

        <link href="<?php echo Doo::conf()->APP_URL . 'global/css/main.css'; ?>" rel="stylesheet" type="text/css" />
        <!-- 核心JS加载 -->
        <script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL . 'global/ckeditor/ckeditor.js'; ?>"></script>
        <script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL . 'global/js/jquery-1.7.2.min.js'; ?>"></script>
        <script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL . 'ckfinder/ckfinder.js'; ?>"></script>

    </head>
    <body>
        <?php
        $productInstance = $data['productInstance'];
        ?>
        <form action="<?php echo $data['root_url'] . '/admin/product/save.html'; ?>" method="post">

            <table>
                <tr>
                    <td><label for="title">title:</label></td>
                    <td><input type="text" name="title" value="<?php echo $productInstance->title; ?>"></td>
                </tr>
                <tr>
                    <td><label for="img_path">img_path:</label></td>
                    <td><input id="img_path" type="text" name="img_path" value="<?php echo $productInstance->img_path; ?>"><input type="button" value="Browse Server" onclick="fileBrowseServer();" /></td>
                </tr>
                <tr>
                    <td><label for="price">price:</label></td>
                    <td><input type="text" name="price" value="<?php echo $productInstance->price; ?>"></td>
                </tr>
                <tr>
                    <td><label for="quantity">quantity:</label></td>
                    <td><input type="text" name="quantity" value="<?php echo $productInstance->quantity; ?>"></td>
                </tr>
                <tr>

                    <td colspan="2"><textarea id="description" name="description" value="<?php echo $productInstance->description; ?>"></textarea></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="submit"/></td>

                </tr> 
            </table>






        </form>   
        <script type="text/javascript">
            CKEDITOR.replace( 'description',
            {
                filebrowserBrowseUrl : "<?php echo Doo::conf()->APP_URL . '/ckfinder/ckfinder.html'; ?>",
                filebrowserImageBrowseUrl : "<?php echo Doo::conf()->APP_URL . '/ckfinder/ckfinder.html?Type=Images'; ?>",
                filebrowserFlashBrowseUrl : "<?php echo Doo::conf()->APP_URL . '/ckfinder/ckfinder.html?Type=Flash'; ?>",
                filebrowserUploadUrl : "<?php echo Doo::conf()->APP_URL . '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; ?>",
                filebrowserImageUploadUrl : "<?php echo Doo::conf()->APP_URL . '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'; ?>",
                filebrowserFlashUploadUrl : "<?php echo Doo::conf()->APP_URL . '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'; ?>"
            });
                            
                            
        </script>

        <script type="text/javascript">

            function fileBrowseServer()
            {
                // You can use the "CKFinder" class to render CKFinder in a page:
                var finder = new CKFinder();
                 
                finder.selectActionFunction = setImgFileField;
                finder.popup();

              
            }

            // This is a sample function which is called when a file is selected in CKFinder.
            function setImgFileField( fileUrl )
            {
                document.getElementById( 'img_path' ).value = fileUrl;
            }

        </script>
    </body>

</html>
