<?php
require './init.php';
// p($_POST);
// exit;

$save_dir = PATH.'./uploads/';

$sql1 ="select head from ".PRE."user where id='{$_SESSION['home']['id']}'";
    $row = query($link,$sql1);

    if($row){
        $row = $row[0]['head'];
        $user_path = PATH.'uploads/';
        $user_path;
        $user_path .= substr($row, 0, 4).'/';
        $user_path .= substr($row, 4, 2).'/';
        $user_path .= substr($row, 6, 2).'/';
        $user_path .= $row;
        // echo $user_path;exit;
        // echo dirname($user_path).'/50_'.$row;
        @unlink($user_path);
        @unlink(dirname($user_path).'/50_'.$row);
        @unlink(dirname($user_path).'/350_'.$row);
        @unlink(dirname($user_path).'/150_'.$row);
    }

$filename = up('file',10485760,array('image'),$save_dir);
if(!$filename) {
    redirect('文件上传失败!');
    exit;
}
// echo $filename;

$img_path = PATH.'./uploads/';
$img_path .= substr($filename, 0, 4).'/';
$img_path .= substr($filename, 4, 2).'/';
$img_path .= substr($filename, 6, 2).'/';
$img_path .= $filename;

if (
    !zoom($img_path,350,350)
    ||
    !zoom($img_path,150,150)
    ||
    !zoom($img_path,50,50)
    ){
                unlink($img_path);
                @unlink(dirname($img_path).'/350_'.$filename);
                @unlink(dirname($img_path).'/150_'.$filename);
                @unlink(dirname($img_path).'/50_'.$filename);
                redirect('图片缩放失败!');
                exit;
    }

$sql = "UPDATE s47_user SET `head`='$filename' WHERE `id`='{$_SESSION['home']['id']}'";


if (execute($link,$sql)) {
                redirect('图片添加成功');
                exit;
            }else{
               redirect('图片添加失败');
                exit;
            }

