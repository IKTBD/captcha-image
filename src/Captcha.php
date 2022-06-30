<?php

namespace Iktbd\CaptchaImage;

class Captcha{

    public static function create()
    {

        $width=50;
        $height=200;
        $password='tret5465';
        $font =  __DIR__.'/font/Berton-Roman-trial.ttf';
        $total_text='';

        $x_array=[20,60,100,140,180,220];
        $text_array=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9'];
        $image_array=[];

        for($i=0;$i<=5;$i++)
        {
            $text_rand=rand(0,51);
            $text=$text_array[$text_rand];
            $total_text.=$text;
            $total_text.=$text;
            $x=$x_array[$i];
            $angle=rand(0,90);
            $y=rand(30,50);
            $font_size=rand(15,25);
            $image_array[]=['font'=>$font,'size'=>$font_size,'angle'=>$angle,'x'=>$x,'y'=>$y,'text'=>$text];
        }

        ob_start();
        $im = imagecreate($width, $height);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, $width, $height, $white);
        foreach($image_array as $key=>$value)
        {imagettftext($im,$value['size'],$value['angle'], $value['x'],$value['y'], $black, $value['font'],$value['text']);}
        imagepng($im);
        imagedestroy($im);
        $contents = ob_get_contents();
        ob_end_clean();
        $id=md5($password.$total_text);
        $image_string='data:image/png;base64,'.base64_encode($contents);
        $image_data['id']=$id
        $image_data['data']=$image_string;

        return $image_data
    }

    public static function check($id,$text)
    {
        $output=false;
        $password='tret5465';
        $new_id=md5($password.$text);
        if($new_id==$id){$output=true;}
        return $output;
    }
}