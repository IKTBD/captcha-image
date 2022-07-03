<?php

namespace Iktbd\CaptchaImage;

class CaptchaHash implements ICaptchaHash
{
    /**
     * @param string $password
     * @param string $codeString
     * @return string
     */
    public function generateHash(string $password, string $codeString): string
    {
        return md5($password . strtolower($codeString));
    }
}
