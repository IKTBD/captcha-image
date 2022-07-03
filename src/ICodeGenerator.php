<?php

namespace Iktbd\CaptchaImage;

interface ICodeGenerator
{
    public function codeGenerator(int $length): string;
}
