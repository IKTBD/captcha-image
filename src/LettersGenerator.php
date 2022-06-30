<?php

namespace Iktbd\CaptchaImage;

class LettersGenerator implements ILettersGenerator
{
    public static function generateLetters(string $text, array $options = []): array
    {
        $lettersList = str_split($text);
        $xLetterPositions = self::generateXPositions($lettersList, $options);

        return array_map(function ($letter, $pos): array {
            return [
                'size' => rand(15, 25),
                'angle' => rand(0, 90),
                'x' => $pos,
                'y' => rand(30, 50),
                'text' => $letter
            ];
        }, $lettersList, $xLetterPositions);
    }

    private static function generateXPositions(array $letters, array $options = []): array
    {
        $options = [
            'leftPadding' => $options['leftPadding'] ?? 20,
            'letterSpacing' => $options['letterSpacing'] ?? 40,
        ];

        $result = [$options['leftPadding']];
        for ($i = 1; $i < count($letters); $i++) {
            $result[] = $result[$i - 1] + $options['letterSpacing'];
        }

        return $result;
    }
}