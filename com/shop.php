<?php
    //商品ID
    $goods_id = $_GET['id'];
    //查询商品详情
    $sql = "
        SELECT i.iname, g.id, g.gname, g.price, g.stock, g.sale, g.msg, g.zan
        FROM ".PRE."goods g, ".PRE."image i
        WHERE g.id = i.goods_id AND i.cover=1 AND g.id='$goods_id';";

        $list = query($link,$sql);
        $list = $list[0];//去除0下标
        /*p($list);*/

        //将该商品的所有非封面全部查出来
    $sql = "SELECT iname FROM ".PRE."image WHERE goods_id='$goods_id' AND cover=0";
    $img_list = query($link, $sql);
    /*p($img_list);*/


    $sql = "SELECT `ordernum`,`user_name`,`say`,`reply` FROM s47_discuss WHERE `goods_id`='$goods_id'";
    $pj = query($link,$sql);
    // p($pj);
    // exit;






        ?>
<div class="container mt50 bgc">
    <div class="row mt50">
        <div class="col-md-4 pull-left">

            <div class="thumbnail">
              <img id="big" src="<?php echo getpath(URL.'uploads/',$list['iname']) ?>">
              <div class="row mt10">
                  <ul>
                      <li class="col-md-2 spic">
                        <img onmouseover="changesrc(this)" src="<?php echo getpath(URL.'uploads/',$list['iname'],'a') ?>">
                      </li>
                      <?php if (!empty($img_list)): ?>
                      <?php foreach ($img_list as $val): ?>
                      <li class="col-md-2 spic">
                        <img onmouseover="changesrc(this)" src="<?php echo getpath(URL.'uploads/',$val['iname'],'a') ?>">
                      </li>
                      <?php endforeach ?>
                      <?php endif ?>
                  </ul>
              </div>
            </div>

        </div><!-- END pull-left -->

        <div class="col-md-7 pull-right">
            <div class="row">
                <h2><?php echo $list['gname'] ?></h2>
                <p><?php echo $list['msg'] ?></p>
            </div>
            <div class="row">
                <h2 class="col-md-6">
                    抢购价:<span class="glyphicon glyphicon-usd  orange"></span>
                    <span class="orange"><?php echo $list['price'] ?></span>
                </h2>
                <h1 class="col-md-3 col-md-offset-1 yy">
                    <a href="./com/dianzan.php?id=<?php echo $goods_id?>" class="zan">
                        <span class="glyphicon glyphicon-heart"></span>
                        <?php echo $list['zan'] ?>
                    </a>
                </h1>
            </div>
            <div style="height:2px;" class="col-md-12 bg-huise"></div>
                
            <form action="./com/cartdo.php" method="get">
                <!-- 隐藏域放入商品的ID -->
                <input type="hidden" name="goods_id" value="<?php echo $goods_id ?>">
                <div class="row mt20">
                    <h4 class="col-md-2">数量:</h4>
                    <div class="col-md-4">
                        <button type="button" class="btn col-md-3 btn-primary" onclick="minus()">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <div class="col-md-6">
                             <input type="text" name="qty" value="1" maxlength="3" class="form-control text-center zan" id="num">
                        </div>
                        <button type="button" class="btn col-md-3 btn-primary" onclick="plus()">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                    <span class="col-md-3 h4">库存: <?php echo $list['stock'] ?></span>
                    <span class="col-md-3 h4">销量: <?php echo $list['sale'] ?></span>
                </div>
                <div class="row mt50">
                    <div style="height:3px;" class="col-md-12 bg-huise"></div>
                    <div class="col-md-12 mt30">
                        <!-- 点击后跳转到购物车页面 -->
                        <button type="submit" name="a" value="buy" class="btn btn-warning btn-lg" <?php echo $list['stock']==0?'disabled':''; ?>><span class="glyphicon glyphicon-plus-sign">&nbsp;立即购买</span></button> 
                        <!-- 点击后只加入购物车的内容,页面不跳转 -->
                        <button type="submit" name="a" value="add" class="btn btn-success btn-lg" <?php echo $list['stock']==0?'disabled':''; ?> onclick="if(confirm('亲,确认加入购物车吗??o(*≧▽≦*)o')==false)return false"><span class="glyphicon glyphicon-shopping-cart">&nbsp;加入购物车</span></button>
                    </div>
                </div>
            </form>
        </div><!-- END pull-right -->
    </div><!-- END row -->
</div><!-- END container -->




<div class="container">
<div class="row">

<table class="table table-hover table table-striped">
<tr>
<th col-md-2>用户</th>
<th col-md-6>评论</th>
<th col-md-4>回复</th>
</tr>
<?php if (empty($pj)): ?>
    <tr>
    <td colspan="3"><h3 class="text-center">还没有人评论哦...</h3></td>
    </tr>
<?php else: ?>
<?php foreach ($pj as $val): ?>
<tr>
<th><?php echo $val['user_name']?></th>
<th><?php echo $val['say']?></th>
<th><?php echo $val['reply']?></th>
</tr>

<?php endforeach ?>
<?php endif ?>
</table>
</div></div>













<div class="hh biaop">
</div>

<div class="manj manjian">
</div>

<div class="fenq fenqigo">
</div>

<div class="xqt1 xqt11">
</div>

<div class="xqt2 xqt22">
</div>

<div class="xqt3 xqt33">
</div>

<div class="xqt4 xqt44">
</div>

<div class="xqt5 xqt55">
</div>

<div class="xqt6 xqt66">
</div>

<div class="xqt7 xqt77">
</div>

<div class="xqt8 xqt88">
</div>


<link rel="stylesheet" href="./public/css/home.css">
