<?php

namespace Iktbd\CaptchaImage;

interface ICaptchaImage
{
    public static function generateImage(int $width, int $height, array $letters): string;
}
