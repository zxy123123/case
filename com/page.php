<?php 
    echo "<span>共{$allpage}页,当前第{$page}页,本页显示{$rows}条记录,共{$total}条记录</span>";
    //判断是否设置了分 页的文件名,如果未设置,默认为index.php
    $pageurl = isset($pageurl)?$pageurl:'index.php';
 ?>

<nav>
    <ul class="pagination">
        <li >
            <a href="./<?php echo $pageurl ?>?page=1<?php echo $urlname ?>"><!--首页-->
                <span class="glyphicon glyphicon-fast-backward"></span>
            </a>
        </li>
        <li>
            <a href="./<?php echo $pageurl ?>?page=<?php echo $prev,$urlname ?>"><!--上一页-->
                <span class="glyphicon glyphicon-backward"></span>
            </a>
        </li>
        <!-- 数字链接 -->
        <?php echo $num_link ?>

        <li>
            <a href="./<?php echo $pageurl ?>?page=<?php echo $next,$urlname ?>"><!--下一页-->
                <span class="glyphicon glyphicon-forward"></span>
            </a>
        </li>
        <li>
            <a href="./<?php echo $pageurl ?>?page=<?php echo $allpage,$urlname ?>"><!--尾页-->
                <span class="glyphicon glyphicon-fast-forward"></span>
            </a>
        </li>
        <li>

            <form class="fengo" action="./<?php echo $pageurl ?>" method="get">
                <input type="hidden" name="name" value="<?php echo $name ?>">
                <select name="page">
                    <?php 
                    for ($i=1; $i <= $allpage; $i++) { 
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                     ?>
                </select>
                <button class="btn btn-primary">GO!</button>
            </form>
        </li>
    </ul>
</nav>


<!-- <ul class="pagination pagination-sm">
  <li class="disabled"><a href="#">&laquo;</a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul> -->