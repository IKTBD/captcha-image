<?php

namespace Iktbd\CaptchaImage;

interface ILettersGenerator
{
    public function generateLetters(string $text, array $options = []): array;
}
