<?php

namespace Iktbd\CaptchaImage;

interface ICaptchaHash
{
    public function generateHash(string $password, string $codeString): string;
}
