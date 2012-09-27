<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="http://www.mamatao.co/public/themes/poprlz/favicon.ico" />

<?php $this->renderc('comment/seoHead', $data);?>

 

<!-- 全局风格CSS -->

<link href="<?php echo Doo::conf()->APP_URL.'global/css/main.css';?>" rel="stylesheet" type="text/css" />
 <!-- 核心JS加载 -->

<script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/js/jquery-1.7.2.min.js';?>"></script>
<script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/js/waypoints-1.1.7.min.js';?>"></script>
<script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/js/jquery.masonry.min.js';?>"></script> 
 
</head>

<body>
	<div id="container">
  <div id="header">
     
 
  </div>
  <div id="mainBody">

    <div id="user_box">

      <?php 
        if(isset($data['user_save_error'])){
            echo '<ul>';
            foreach ($data['user_save_error'] as $key => $value) {
               echo '<li>'.$value.'</li>';
            }
            echo '</ul>';

        }
      ?>
       <form action="<?php echo Doo::conf()->APP_URL.'index.php/user/save.html';?>" method="post">
            <input type="text" name="email"/>
            <input type="password" name="password"/>
            <input type="submit" name="submit"/>
       </form>
       
    </div>

     
    <div id="footer">
      <div class="copyright">copyright &copy; 2012  . All rights reservide </div>
    </div>
  </div>
</div>
 
</body>
</html>