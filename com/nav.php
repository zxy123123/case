<?php 
    $sql = "SELECT `id`,`cname`,`path` FROM ".PRE."category WHERE `display`='1' order by path limit 4";
    $c_list = query($link, $sql);
    /*p($c_list);exit;*/
    // p($_SESSION);
    // exit;
 ?>



<!-- 导航条 -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php">
          <img src="<?php echo URL ?>imgs/1.png" id="logo">  
      </a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo URL?>index.php">首页 </a></li>
       
        <li><a href="zxsc.php">在线商城</a></li>
        <li><a href="nb404.php">服务支持</a></li>
        <li><a href="nb404.php">官方论坛</a></li>
         <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" >品牌中心<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="gongsijieshao.php" target="_blank"><span class="glyphicon glyphicon-send">&nbsp;公司介绍</span></a>
        </li>
        <li><a href="pinpailinian.php" target="_blank"><span class="glyphicon glyphicon-globe">&nbsp;品牌理念</span></a>
        </li>
        <li><a href="nb404.php" target="_blank"><span class="glyphicon glyphicon-list-alt">&nbsp;品牌新闻</span></a>
        </li>
        </ul></li>
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" >产品中心 <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if (!empty($c_list)): ?>
            <?php foreach ($c_list as $val): ?>
                <li><a href="./list.php?cate_id=<?php echo $val['id'] ?>"><?php echo $val['cname'] ?></a></li>
            <?php endforeach ?> 
            <?php endif ?>
          </ul>
        </li>
      </ul>
      <form action="./search.php" method="get" class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" name="s" class="form-control" placeholder="按商品名搜索">
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>搜索</button>
        </div>
        
      </form>

      <?php if (empty($_SESSION['home'])): ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="showcart.php">
        <span class="glyphicon glyphicon-shopping-cart">购物车 <?php 
                      if (!empty($_SESSION['cart'])) {
                                $num = 0;
                                foreach ($_SESSION['cart'] as $values) {
                                $num += $values['qty'];
                                }
                                echo $num;
                                unset($values);
                                unset($num);
                            }
            ?>
        </span>
        </a>
        </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo URL ?>login.php">登录</a></li>
              <li><a href="<?php echo URL ?>reg.php">注册</a></li>
              <li><a href="./admin/login.php">后台入口</a></li>
             
            </ul>
          </li>
        </ul>
      <?php else: ?>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="showcart.php"><span class="glyphicon glyphicon-shopping-cart">购物车 <?php 
                            if (!empty($_SESSION['cart'])) {
                                $num = 0;
                                foreach ($_SESSION['cart'] as $values) {
                                    $num += $values['qty'];
                                }
                                echo $num;
                                unset($values);
                                unset($num);
                            }
                        ?>

          </span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['home']['name'] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./Personal Center.php">个人中心</a></li>     
              <li role="separator" class="divider"></li>
              <li><a href="./com/logout.php">退出</a></li>
            </ul>
          </li>
        </ul>
      <?php endif ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>