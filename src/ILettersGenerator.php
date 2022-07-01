<?php

namespace Iktbd\CaptchaImage;

interface ILettersGenerator
{
    public static function generateLetters(string $text, array $options = []): array;
}
