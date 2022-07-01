<?php

namespace Iktbd\CaptchaImage;

interface ICaptchaHash
{
    public static function generateHash(string $password, string $codeString): string;
}
