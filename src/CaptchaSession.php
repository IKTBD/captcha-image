<?php

namespace Iktbd\CaptchaImage;

use Iktbd\CaptchaImage\CaptchaConfig;

class CaptchaSession{

    static function start($id='')
    {
        
        if(session_status()==PHP_SESSION_NONE)
        {
            ini_set('session.save_path',__DIR__.'/storage/session');
            session_start();
        }
        
    }

    static function set(array $session_value=[])
    {
        foreach($session_value as $key=>$value)
        {$_SESSION[$key]=$value;}
    }

    static function check($name='')
    {
        $output=false;
        if(isset($_SESSION[$name])==true){$output=true;}
        return $output;
    }

    static function get($name='')
    {
        $output='';
        if(isset($_SESSION[$name])){$output=$_SESSION[$name];}
        return $output;
    }

    static function delete($name)
    {unset($_SESSION[$name]);}

    static function clear()
    {
        $dir=__DIR__.'/storage/session/*';
        $files = glob($dir);
        foreach($files as $file)
        {if(is_file($file)){unlink($file);}}
    }
}