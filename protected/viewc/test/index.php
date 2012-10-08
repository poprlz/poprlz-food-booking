<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <?php $this->renderc('comment/seoHead', $data); ?>



        <!-- 全局风格CSS -->

        <link href="<?php echo Doo::conf()->APP_URL . 'global/css/main.css'; ?>" rel="stylesheet" type="text/css" />
        <!-- 核心JS加载 -->
        <script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL . 'global/ckeditor/ckeditor.js'; ?>"></script>
        <script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL . 'global/js/jquery-1.7.2.min.js'; ?>"></script>


    </head>

    <body>
        <div id="container">
            <div id="header">


            </div>
            <div id="mainBody">
                <form method="post">
                    <p>
                        My Editor:<br />
                        <textarea id="editor1" name="editor1">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor1',
                            {
                                filebrowserBrowseUrl : "<?php echo Doo::conf()->APP_URL .'/ckfinder/ckfinder.html'; ?>",
                                filebrowserImageBrowseUrl : "<?php echo Doo::conf()->APP_URL .'/ckfinder/ckfinder.html?Type=Images'; ?>",
                                filebrowserFlashBrowseUrl : "<?php echo Doo::conf()->APP_URL .'/ckfinder/ckfinder.html?Type=Flash'; ?>",
                                filebrowserUploadUrl : "<?php echo Doo::conf()->APP_URL .'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; ?>",
                                filebrowserImageUploadUrl : "<?php echo Doo::conf()->APP_URL .'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'; ?>",
                                filebrowserFlashUploadUrl : "<?php echo Doo::conf()->APP_URL .'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'; ?>"
                            });
                        </script>
                    </p>
                    <p>
                        <input type="submit" />
                    </p>
                </form>




            </div>
            <div id="footer">
                <div class="copyright">copyright &copy; 2012  . All rights reservide </div>
            </div>
        </div>

    </body>
</html>