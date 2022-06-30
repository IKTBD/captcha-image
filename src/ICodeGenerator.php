<?php

namespace Iktbd\CaptchaImage;

interface ICodeGenerator
{
    public static function codeGenerator(int $length): string;
}
