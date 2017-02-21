<?php
    header("content-type:text/html;charset=utf-8");
    date_default_timezone_set('PRC');

    yzm(150,40,1,4);

    /**
     * [yzm 验证码函数]
     * @param  integer $width  [验证码的宽度,默认100]
     * @param  integer $height [验证码的高度,默认40]
     * @param  integer $type   [验证码的类型,默认数字]
     * @param  integer $length [验证码的个数,默认4个]
     * @return 生成好的验证码图片png
     */
    function yzm($width=100,$height=40,$type=1,$length=4)
    {
        $img = imagecreatetruecolor($width, $height);

        //在外部生成两个随机的深浅色函数.darkcolor() lightcolor()
        
        //浅色背景
        imagefill($img,0,0, lightcolor($img));

        //画干扰点
        for ($i=0; $i < floor($width); $i++) { 
            $x = mt_rand(0,$width);
            $y = mt_rand(0,$height);
            imagesetpixel($img, $x, $y, darkcolor($img));
        }

        //画干扰线
        for ($i=0; $i < floor($height/10); $i++) { 
            $x1 = mt_rand(0,$width);
            $y1 = mt_rand(0,$height);
            $x2 = mt_rand(0,$width);
            $y2 = mt_rand(0,$height);
            imageline($img, $x1,$y1, $x2,$y2, darkcolor($img));
        }

        //源字符
        $str = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        // echo $str[10];
        switch ($type) {
            case 1:
                //纯数字
                $start = 0;
                $end = 9;
                break;
            case 2:
                //纯字母
                $start = 10;
                $end = 61;
                break;
            case 3:
                //混合型
                $start = 0;
                $end = 61;
                break;
        }
        //生成随机的字符串
        $sjstr = '';
        for ($i=0; $i < $length; $i++) { 
            $sj = mt_rand($start,$end);
            $sjstr .= substr($str,$sj,1);
        }
        // echo $sjstr;

        //在未来,我们会用到的!
        session_start();
        $_SESSION['vcode'] = $sjstr;

        //写随机字符串
        $w = floor($width / $length);
        for ($i=0; $i < $length; $i++) { 
            $x = $w * $i + 5;
            $y = mt_rand(ceil($height/2),$height);
            imagettftext(
                $img,
                floor($width/8),//字体大小,根据宽度来改变
                mt_rand(-20,20),//倾斜角度
                $x,$y,
                darkcolor($img),
                '../public/fonts/'.mt_rand(1,5).'.ttf',
                $sjstr[$i]
                );
        }

        header("content-type:image/png");
        imagepng($img);
        imagedestroy($img);
    }


    /**
     * [darkcolor 生成深色]
     * @param  re $img 指定的资源
     * @return 颜色标识
     */
    function darkcolor($img)
    {
        return imagecolorallocate($img, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
    }


    /**
     * [lightcolor 生成浅色]
     * @param  re $img 指定的资源
     * @return 颜色标识
     */
    function lightcolor($img)
    {
        return imagecolorallocate($img, mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
    }