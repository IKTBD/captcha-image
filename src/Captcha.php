<?php

namespace Iktbd\CaptchaImage;

use Iktbd\CaptchaImage\CaptchaConfig;
use Iktbd\CaptchaImage\CaptchaGenerate;

class Captcha{

    //Create new captcha string
    public static function create($password)
    {
        if($password!=''){CaptchaConfig::$password=$password;}
        return CaptchaGenerate::create();
    }

    //Verify captcha text
    public static function verify($password,$text)
    {
        if($password!=''){CaptchaConfig::$password=$password;}
        return CaptchaHash::verify($text);
    }
}