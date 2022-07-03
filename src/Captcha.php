<?php

namespace Iktbd\CaptchaImage;

class Captcha
{
    /**
     * @var ICaptchaFactory
     */
    private static $captchaFactory = null;
    /**
     * @var ICaptchaHash
     */
    private static $captchaHash;
    /**
     * @var ICaptchaImage
     */
    private static $captchaImage;
    /**
     * @var ICodeGenerator
     */
    private static $codeGenerator;
    /**
     * @var ILettersGenerator
     */
    private static $lettersGenerator;

    /**
     * @var int
     */
    private static $captchaWidth = 250;
    /**
     * @var int
     */
    private static $captchaHeight = 50;

    /**
     * @param ICaptchaFactory|null $captchaFactory
     * @return void
     */
    public static function init(ICaptchaFactory $captchaFactory = null)
    {
        self::$captchaFactory = $captchaFactory ?? new CaptchaFactory();

        self::$captchaHash = self::$captchaFactory->createCaptchaHash();
        self::$captchaImage = self::$captchaFactory->createCaptchaImage();
        self::$codeGenerator = self::$captchaFactory->createCodeGenerator();
        self::$lettersGenerator = self::$captchaFactory->createLettersGenerator();
    }

    /**
     * @return void
     */
    public static function unSetFactory()
    {
        self::$captchaFactory = null;
    }

    /** Create captcha
     * @param string $password
     * @return array
     */
    public static function create(string $password): array
    {
        if (self::$captchaFactory == null) {
            self::init();
        }

        $codeString = (self::$codeGenerator)->codeGenerator(6);

        $letters = (self::$lettersGenerator)->generateLetters($codeString, [
            'leftPadding' => 20,
            'letterSpacing' => 40,
        ]);

        $imageContent = (self::$captchaImage)->generateImage(self::$captchaWidth, self::$captchaHeight, $letters);

        return [
            'id' => (self::$captchaHash)->generateHash($password, $codeString),
            'data' => 'data:image/png;base64,' . base64_encode($imageContent)
        ];
    }

    /** Check captcha result
     * @param string $password
     * @param string $id
     * @param string $codeString
     * @return bool
     */
    public static function check(string $password, string $id, string $codeString): bool
    {
        if (self::$captchaFactory == null) {
            self::init();
        }

        $captchaHash = (self::$captchaHash)->generateHash($password, $codeString);
        if ($captchaHash == $id) {
            return true;
        }

        return false;
    }
}
