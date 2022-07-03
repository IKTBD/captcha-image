<?php

namespace Iktbd\CaptchaImage;

interface ICaptchaFactory
{
    public function createCaptchaHash();

    public function createCaptchaImage();

    public function createCodeGenerator();

    public function createLettersGenerator();
}
