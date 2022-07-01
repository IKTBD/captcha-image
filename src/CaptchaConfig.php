<?php

namespace Iktbd\CaptchaImage;

class CaptchaConfig{

    // Image width
    static $width=250;

    // Image Height
    static $height=50;

    // Hash generate password
    static $password='jsdfrhywffh538glo';

    // Text font
    static $font = __DIR__.'/font/Berton-Roman-trial.ttf';

    //Maximum font size
    static $max_font_size =25;

    //Min font size
    static $min_font_size =15;

    // max X position 
    static $max_x_position=220;

    //Min X position
    static $min_x_position=20;

    // max Y position 
    static $max_y_position=50;

    //Min Y position
    static $min_y_position=30;

    // X Y Gap
    static $x_y_gap=15;

    //Padding
    static $padding=20;

    //Total generated text
    static $total_text='';

}