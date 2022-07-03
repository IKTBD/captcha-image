<?php

namespace Iktbd\CaptchaImage;

interface ICaptchaImage
{
    public function generateImage(int $width, int $height, array $letters): string;
}
