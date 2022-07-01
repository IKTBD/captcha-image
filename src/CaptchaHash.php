<?php

namespace Iktbd\CaptchaImage;

use Iktbd\CaptchaImage\CaptchaConfig;
use Iktbd\CaptchaImage\CaptchaSession;

class CaptchaHash{

    // Create hash for generated text
    public static function create()
    {
        CaptchaSession::start();

        // Hashing the generated text with password
        $output=md5(CaptchaConfig::$password.strtolower(CaptchaConfig::$total_text));

        // Store the hash data to the session
        CaptchaSession::set(['ik_captcha_hash'=>$output]);

        // Return the hash
        return $output;
    }


    // Verify the submetted text
    public static function verify($text)
    {
        CaptchaSession::start();

        $output=false;

        // Get the hash data from the session
        $hash=CaptchaSession::get('ik_captcha_hash');

        // Make new hash form the submetted text
        $new_hash=md5(CaptchaConfig::$password.strtolower($text));
        if($new_hash==$hash){$output=true;}

        CaptchaSession::delete('ik_captcha_hash');
        // Return the result
        return $output;
    }
}