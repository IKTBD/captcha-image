<?php

use Iktbd\CaptchaImage\CaptchaHash;
use PHPUnit\Framework\TestCase;

class CaptchaHashTest extends TestCase
{
    public function testGenerateHash()
    {
        $codeOne = 'test1';
        $codeTwo = 'test2';
        $password = 'testPassword';

        $hashOne = CaptchaHash::generateHash($password, $codeOne);
        $hashTwo = CaptchaHash::generateHash($password, $codeTwo);

        $this->assertNotEquals($hashOne, $hashTwo);
        $this->assertSame(32, strlen($hashOne));
    }
}
