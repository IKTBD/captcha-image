<?php

namespace Iktbd\CaptchaImage;

class Captcha
{
    /**
     * @var ICaptchaHash
     */
    private static $ICaptchaHash;
    /**
     * @var CaptchaImage
     */
    private static $ICaptchaImage;
    /**
     * @var CodeGenerator
     */
    private static $ICodeGenerator;
    /**
     * @var LettersGenerator
     */
    private static $ILettersGenerator;

    private static $widthCaptcha = 250;
    private static $heightCaptcha = 50;

    private static function init()
    {
        self::$ICaptchaHash = new CaptchaHash();
        self::$ICaptchaImage = new CaptchaImage();
        self::$ICodeGenerator = new CodeGenerator();
        self::$ILettersGenerator = new LettersGenerator();
    }

    public static function create(string $password): array
    {
        self::init();

        $codeString = (self::$ICodeGenerator)::codeGenerator(6);
        $letters = (self::$ILettersGenerator)::generateLetters($codeString, [
            'leftPadding' => 20,
            'letterSpacing' => 40,
        ]);

        $imageContent = (self::$ICaptchaImage)::generateImage(self::$widthCaptcha, self::$heightCaptcha, $letters);

        return [
            'id' => (self::$ICaptchaHash)::generateHash($password, $codeString),
            'data' => 'data:image/png;base64,' . base64_encode($imageContent)
        ];
    }

    public static function check(string $password, string $id, string $codeString): bool
    {
        self::init();

        $hash = (self::$ICaptchaHash)::generateHash($password, $codeString);
        if ($hash == $id) {
            return true;
        }

        return false;
    }
}
