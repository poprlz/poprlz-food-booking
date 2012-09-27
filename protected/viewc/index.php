<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广州打折包邮连衣裙</title>

<link rel="shortcut icon" href="http://www.mamatao.co/public/themes/poprlz/favicon.ico" />

<meta name="keywords" content="广州打折包邮连衣裙,淘宝购物,包邮" />

<meta name="description" content="淘宝广州打折包邮连衣裙" />

 

<!-- 全局风格CSS -->

<link href="<?php echo Doo::conf()->APP_URL.'global/css/main.css';?>" rel="stylesheet" type="text/css" />
 <!-- 核心JS加载 -->

<script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/js/jquery-1.7.2.min.js';?>"></script>
<script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/js/waypoints-1.1.7.min.js';?>"></script>
<script  type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/js/jquery.masonry.min.js';?>"></script> 
<script  type="text/javascript" src="http://a.tbcdn.cn/apps/stargate/ac/js/proxy.js?t=<?php echo date("U"); ?>"></script> 
</head>

<body>
	<div id="container">
  <div id="header" class="fixHeader">
    <div class="logoBar"><a href="/"><img src="<?php echo Doo::conf()->APP_URL.'global/images/logo.gif';?>"/></a>
      <h1>淘宝</h1>
    </div>
    <div class="menuBar">
      <ul>
        <li><a href="<?php echo Doo::conf()->APP_URL.'index.php?min_price=0&max_price=30.00';?>">30元包邮</a></li>
        <li> <a href="<?php echo Doo::conf()->APP_URL.'index.php?min_price=30.00&max_price=40.00';?>">30-40元包邮</a> </li>
        <li> <a href="<?php echo Doo::conf()->APP_URL.'index.php?min_price=40.00&max_price=50.00';?>">40-50元包邮</a> </li>
        <li> <a href="<?php echo Doo::conf()->APP_URL.'index.php?min_price=50.00&max_price=80.00';?>">50-80元包邮 </a> </li>
        <li> <a href="<?php echo Doo::conf()->APP_URL.'index.php?min_price=80.00&max_price=100.00';?>">80-100元包邮 </a> </li>
        <li> <a href="<?php echo Doo::conf()->APP_URL.'index.php?min_price=100.00&max_price=10000000.00';?>">100包邮 </a> </li>
      </ul>
    </div>
 
  </div>
  <div id="mainBody">
    <div class="section">
      <h3>产品列表</h3>
      <div class="list">
        <ul id="product_list_ui">
           
   
 
 
 
  <?php foreach ($data['couponProducts'] as $couponProduct) {
  ?>
  <li > 
    <a href="<?php echo $couponProduct['click_url'];?>" target="_blank" title="<?php echo $couponProduct['title'];?>"> 
      <img class="productImg" src="<?php echo $couponProduct['pic_url'];?>"
                                     alt="<?php echo $couponProduct['title'];?>"/>
                                     
            <div class="couponPrice">
              <span>折扣价：</span>
              <strong>￥<?php echo $couponProduct['coupon_price'];?></strong>
              <span class="orgPrice">原价：￥<?php echo $couponProduct['price'];?></span>
            </div>
            
            <span>折扣：<?php echo ($couponProduct['coupon_rate']/100).'%';?></span>
            <span>月销售：<?php echo $couponProduct['volume'];?></span>
            
            <h4><?php echo $couponProduct['title'];?></h4>
    </a>
  </li>
   
  <?php 
  }
  ?>
        </ul>
        <div class="more" page="1" id='more_product_loading'>正在扫描产品</div>
      </div>
    </div>
    <div id="footer">
      <div class="copyright">copyright &copy; 2012  . All rights reservide </div>
    </div>
  </div>
</div>
<script type="text/javascript">
        $(document).ready(function () {
      /**
      $('#product_list_ui').masonry({
        
          itemSelector : 'li',
          columnWidth : 240
        });
                   
         **/       
                  
            var $loading = $("<div class='loading'><p>Loading more items&hellip;</p></div>"),
                $footer = $('#more_product_loading'),
                opts = {
                    offset:'130%'
                };

            $footer.waypoint(function (event, direction) {
                $footer.waypoint('remove');
                $('body').append($loading);
                var pageIndex = parseInt($('#more_product_loading').attr('page'))
                 
                $('#more_product_loading').attr('page', pageIndex + 1)
                var nextPageIndex = parseInt($('#more_product_loading').attr('page'))
                var url = "<?php echo Doo::conf()->APP_URL.'index.php/couponProduct?min_price='.$data['min_price'].'&max_price='.$data['max_price'];?>&page_index="+pageIndex;
                //alert(url)
                $.get(url, function (data) {
                    var $data = $(data);
                    $('#product_list_ui').append($data);
                    $loading.detach();
                    //$('.more').replaceWith($data.find('.more'));
                    $footer.waypoint(opts);
                });
            }, opts);

       



        });
    </script>
</body>
</html>