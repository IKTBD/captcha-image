<?php


use Iktbd\CaptchaImage\Captcha;
use PHPUnit\Framework\TestCase;

class CaptchaTest extends TestCase
{

    public function testCreate()
    {
        $captcha = Captcha::create('test');

        $this->assertIsArray($captcha);
        $this->assertSame(32, strlen($captcha['id']));
    }

    public function testCheck()
    {
        $captcha = Captcha::check('test', '30209a16f83f6f78e8baf0926008f3b0', 'UbNhM9');

        $this->assertTrue($captcha);
    }
}
