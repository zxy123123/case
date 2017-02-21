<?php 
    //函数库文件
    
    /**
     * [v 输出变量类型和值]
     * @param  mixed $var [传入要打印输出的变量]
     * @return 直接打印输出变量
     */
    function v($var)
    {
        echo '<pre>';
            var_dump($var);
        echo '</pre>';
    }


    /**
     * [p 格式化输出变量]
     * @param  mixed $var [传入要打印输出的变量]
     * @return 直接打印输出变量
     */
    function p($var)
    {
        echo '<pre>';
            echo '您输出的变量类型是:'.gettype($var).'<br>';
            print_r($var);
        echo '</pre>';
    }


    /**
     * [redirect 专业前台跳转30年]
     * @param  string  $msg [页面的跳转信息]
     * @param  string  $url [跳转页面的地址url]
     * @param  integer $t   [跳转的时间s]
     * @return [显示跳转的页面,并执行跳转]
     */
    function redirect($msg='', $url='', $t=3)
    {
        //如果url为空
        if ($url == '') {
            //则回到来之前的页面
            $url = $_SERVER['HTTP_REFERER'];
        }
        require PATH.'com/redirect.php';
    }


    /**
     * [admin_redirect 专业后台跳转30年]
     * @param  string  $msg [页面的跳转信息]
     * @param  string  $url [跳转页面的地址url]
     * @param  integer $t   [跳转的时间s]
     * @return [显示跳转的页面,并执行跳转]
     */
    function admin_redirect($msg='', $url='', $t=3)
    {
        //如果url为空
        if ($url == '') {
            //则回到来之前的页面
            $url = $_SERVER['HTTP_REFERER'];
        }
        require ADMIN_PATH.'redirect.php';
    }


    /**
     * [execute 专业增/删/改 函数30年]
     * @param  object $link [mysqli的连接标识]
     * @param  string $sql  [要执行的SQL语句]
     * @return 成功时:添加语句,返回自增ID,删/改语句,true
     *         以上都失败返回false
     */
    function execute($link, $sql)
    {
        //执行SQL语句
        $result = mysqli_query($link,$sql);
        //处理结果集
        if ($result) {
            //添加时会返回自增ID
            if (mysqli_insert_id($link)>0) {
                //添加时返回自增ID
                return mysqli_insert_id($link);
            }else{
                //删改时返回true
                return true;
            }
        }else{
            //操作失败
            return false;
        }
    }


    /**
     * [query 专业查询30年]
     * @param  object $link [mysqli的连接标识]
     * @param  string $sql  [要执行的SQL语句]
     * @return 查询成功返回数组,失败返回false
     */
    function query($link, $sql)
    {
        //执行SQL语句
        $result = mysqli_query($link,$sql);
        //判断执行结果
        if ($result && mysqli_num_rows($result)>0) {
            $list = array();
            $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
            mysqli_free_result($result);

            //返回查询结果数组
            return $list;
        }else{
            //查询失败,返回false
            return false;
        }
    }


    /**
     * [up 上传函数]
     * @param  string  $myfile [表单中name的值 默认为myfile]
     * @param  integer $size   [允许上传的最大值 默认为10M]
     * @param  array   $type   [允许上传的主类型 默认为image text]
     * @param  string  $dir    [默认的保存根目录 默认为./uploads/]
     * @return 成功返回文件的名字,失败返回false
     */
    function up($myfile='myfile', $size=10485760, $type=array('image','text'), $dir='./uploads/')
    {

        //判断$_FILES是否为空
        if (empty($_FILES)) {
            echo '请检查您的表单设置或php.ini中的post的设置';
            return false;
        }

        //接收上传的全部数据
        $fileError = $_FILES[$myfile]['error'];//错误号
        $fileSize = $_FILES[$myfile]['size'];//文件大小
        $fileType = $_FILES[$myfile]['type'];//文件类型 image/png
        $fileName = $_FILES[$myfile]['name'];//原文件名
        $fileTmp = $_FILES[$myfile]['tmp_name'];//临时文件

        //判断错误
        if ($fileError > 0) {
            echo '文件上传出错!';
            switch ($fileError) {
                case 1:
                    echo '上传的文件超过了php.ini 中 upload_max_filesize选项限制的值';
                    break;
                case 2:
                    echo '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
                    break;
                case 3:
                    echo '文件只有部分被上传';
                    break;
                case 4:
                    echo '没有文件被上传';
                    break;
                case 6:
                    echo '找不到临时文件夹。';
                    break;
                case 7:
                    echo '文件写入失败。';
                    echo '<br>';
                    break;
            }
            //执行到此处函数停止
            return false;
        }

        //自由限制文件大小
        if ($fileSize > $size) {
            //上传文件的大小 > 限制大小
            echo '文件超出限制大小';
            return false;
        }

        //限制文件的类型
        list($mainType) = explode('/',$fileType);
        // echo $mainType;
        // 在调用此函数时,可指定文件主类型,进行匹配
        if (!in_array($mainType, $type)) {
            echo '文件类型不合法!';
            return false;
        }

        //保存文件的设定
        //文件名的形式: 时间+唯一的ID+后缀
        //后缀
        $ext = pathinfo($fileName,PATHINFO_EXTENSION);
        $saveName = date('Ymd').uniqid().'.'.$ext;
        //指定保存的路径
        $savePath = rtrim($dir,'/').'/'.date('Y/m/d/');
        //检测目录是否存在
        if (!file_exists($savePath)) {
            //如果不存在,则建之
            mkdir($savePath, 0777, true);
        }
        //保存路径
        $saveFile = $savePath.$saveName;
        
        //移动上传来的文件到指定位置
        if (move_uploaded_file($fileTmp, $saveFile)) {
            echo '上传成功!<br>';
            return $saveName;
        }else{
            echo '上传失败!<br>';
            return false;
        }
    }


    /**
     * [zoom 缩放函数]
     * @param  string  $imagefile [要缩放的图片]
     * @param  integer $zoom_w    [缩放的宽度]
     * @param  integer $zoom_h    [缩放的高度]
     * @return 缩放好的文件名字,如果缩放失败返回false
     */
    function zoom($imagefile,$zoom_w=200,$zoom_h=200)
    {
        //获取原图信息
        $img_info = getimagesize($imagefile);
        if (!$img_info) {
            echo '图片非法';
            return false;
        }
        //获取源图片的宽和高
        list($src_w,$src_h) = $img_info;
        //获取mime
        $mime = $img_info['mime'];
        //获取主类型和子类型
        list($type,$subtype) = explode('/', $mime);

        //生成打开和关闭的函数名
        $create_img = 'imagecreatefrom'.$subtype;
        $save_img = 'image'.$subtype;

        //等比缩放
        // 宽>高?  高>宽?
        if ($src_w > $src_h) {
            //宽>高  按宽度来缩放,按比例来改变高度
            $zoom_h = $zoom_w / $src_w * $src_h;
            $pre = $zoom_w;
        }else{
            //宽<高  按高度来缩放,按比例来改变宽度
            $zoom_w = $zoom_h / $src_h * $src_w;
            $pre = $zoom_h;
        }

        //创建画布
        $src_img = $create_img($imagefile);//源图的资源
        $zoom_img = imagecreatetruecolor($zoom_w,$zoom_h);//缩放图的资源

        //开始缩放
        // imagecopyresampled();
        // 参1 缩放图片的资源
        // 参2 源图的资源
        // 参3,4 缩放图片画图的起始点坐标
        // 参5,6 源图拷贝的起始点坐标
        // 参7,8 缩放图片的宽高
        // 参9,10 源图的宽高
        imagecopyresampled($zoom_img,$src_img, 0,0, 0,0, $zoom_w,$zoom_h,$src_w,$src_h);
        
        //生成保存文件名
        $save_file = dirname($imagefile).'/'.$pre.'_'.basename($imagefile);
        //保存图片
        $save_img($zoom_img,$save_file);
        imagedestroy($src_img);
        imagedestroy($zoom_img);
        return $save_file;
    }

    /**
     * [getpath 获取图片路径]
     * @param  string $url      [根文件夹]
     * @param  string $filename [图片名字]
     * @param  string $a         [图片尺寸类型,默认原图]
     * @return 返回图片的完整路径
     */
    function getpath($url, $filename, $a='d')
    {
        switch ($a) {
            case 'a':
                $pop = '50_';
                break;
            case 'b':
                $pop = '150_';
                break;
            case 'c':
                $pop = '350_';
                break;
            case 'd':
                $pop = null;
                break;
        }
        $img_path = $url;
        $img_path .= substr($filename,0,4).'/';
        $img_path .= substr($filename,4,2).'/';
        $img_path .= substr($filename,6,2).'/';
        $img_path .= $pop.$filename;
        return $img_path;
    }




