<?php


use Iktbd\CaptchaImage\Captcha;
use Iktbd\CaptchaImage\CaptchaFactory;
use PHPUnit\Framework\TestCase;

class CaptchaTest extends TestCase
{
    public function testCreate()
    {
        // Use default factory
        $captcha = Captcha::create('test');

        $this->assertIsArray($captcha);
        $this->assertSame(32, strlen($captcha['id']));

        // Set factory
        Captcha::init(new CaptchaFactory());
        $captcha = Captcha::create('test');

        $this->assertIsArray($captcha);
        $this->assertSame(32, strlen($captcha['id']));
    }

    public function testCheck()
    {
        // Use default factory
        Captcha::unSetFactory();
        $captchaOne = Captcha::check('test', '30209a16f83f6f78e8baf0926008f3b0', 'UbNhM9');
        $captchaTwo = Captcha::check('test2', '30209a16f83f6f78e8baf0926008f3b0', 'UbNhM9');

        $this->assertTrue($captchaOne);
        $this->assertFalse($captchaTwo);

        // Set factory
        Captcha::init(new CaptchaFactory());
        $captchaThree = Captcha::check('test', '30209a16f83f6f78e8baf0926008f3b0', 'UbNhM9');
        $this->assertSame($captchaOne, $captchaThree);
    }
}
