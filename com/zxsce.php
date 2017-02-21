<?php 
        $sql = "
        SELECT i.iname, g.gname, g.id, g.price, g.zan
        FROM ".PRE."goods g, ".PRE."image i
        WHERE i.goods_id = g.id AND i.cover=1 AND g.state=1 AND g.is_new=1 limit 6
        ";
        $list = query($link, $sql);
/*echo count($list);
exit;*/
 ?>

<!-- <link rel="stylesheet" href="./public/css/home.css"> -->


    <div class="qcn">
        <a href="./nb404.php"><img src="./imgs/q2w3.jpg"></a>
    </div>

    <div class="ztb bgq">
    </div>
    <div class="container">
    <div class="row">
        <h2>热销·新品</h2>
        <hr>
    </div>
    <div class="row">
        <?php $qfd = 0;?><!-- 清浮动 -->
        <?php if (empty($list)): ?>
        <h2>暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $key => $val): ?>
        <div class="col-md-4">
          <div class="thumbnail s1 "><!-- s1表示超长的名字用省略号代替 -->
            <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'c') ?>">
            </a>
            <div class="caption ">
                <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                    <h4><?php echo $val['gname'] ?></h4>
                </a>  
              <h3 >
                <span class="glyphicon glyphicon-usd"></span>
                <?php echo $val['price'] ?>
            <!-- 这里原来是右飘点赞的功能,因为点进去已有,所以取消 -->
                <br><br><a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" class="btn btn-success btn-block" target="_blank"><span class="glyphicon glyphicon-leaf">&nbsp;查看详情</span></a>
                
              </h3>
            </div>

          </div>
        </div>
        <?php $qfd++;echo $qfd%3==0?'<div class="clear"></div>':''; ?><!-- 每三个图片清一次浮动 -->
        <?php endforeach ?>
        <?php endif ?>

    </div><!-- END row -->
</div><!-- END container -->

    
    <div class="dkb bgq">
    </div>


























