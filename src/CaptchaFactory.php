<?php

namespace Iktbd\CaptchaImage;

class CaptchaFactory implements ICaptchaFactory
{
    public function createCaptchaHash(): ICaptchaHash
    {
        return new CaptchaHash();
    }

    public function createCaptchaImage(): ICaptchaImage
    {
        return new CaptchaImage();
    }

    public function createCodeGenerator(): ICodeGenerator
    {
        return new CodeGenerator();
    }

    public function createLettersGenerator(): ILettersGenerator
    {
        return new LettersGenerator();
    }
}
