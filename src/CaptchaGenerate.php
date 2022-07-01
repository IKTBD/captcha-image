<?php

namespace Iktbd\CaptchaImage;

use Iktbd\CaptchaImage\CaptchaConfig;
use Iktbd\CaptchaImage\CaptchaHash;
use Iktbd\CaptchaImage\CaptchaArray;

class CaptchaGenerate{

    // Generate the new image string
    public static function create()
    {
        //Empty the total text
        CaptchaConfig::$total_text='';

        //Start the tmp object
        ob_start();
        //Createing the new image with width and height
        $im = imagecreate(CaptchaConfig::$width,CaptchaConfig::$height);
        //Set the image back color
        $white = imagecolorallocate($im, 255, 255, 255);
        //Set the text color
        $black = imagecolorallocate($im, 0, 0, 0);
        //Creat the image rectangle
        imagefilledrectangle($im, 0, 0, CaptchaConfig::$width, CaptchaConfig::$height, $white);

        for($i=0;$i<=5;$i++)
        {
            //Generate random number
            $text_rand=rand(0,51);
            //Get character from array
            $text=CaptchaArray::$character_array[$text_rand];
            //Store total character
            CaptchaConfig::$total_text.=$text;
            //Text X position
            $x=CaptchaArray::$x_array[$i];
            //Text angle
            $angle=rand(0,90);
            //Text Y position
            $y=rand(CaptchaConfig::$min_y_position,CaptchaConfig::$max_y_position);

            //Font
            $font=CaptchaConfig::$font;
            //Text font size
            $font_size=rand(CaptchaConfig::$min_font_size,CaptchaConfig::$max_font_size);
           
            //Set text on image
            imagettftext($im,$font_size,$angle, $x,$y, $black, $font,$text);
        }
        //Make png image
        imagepng($im);
        //Destroy image
        imagedestroy($im);
        //Get object content
        $contents = ob_get_contents();
        //Clean object
        ob_end_clean();
        //Create hash
        CaptchaHash::create();
        //Making base64 string for image SRC
        $image_string='data:image/png;base64,'.base64_encode($contents);
        //Return result
        return $image_string;
    }
}