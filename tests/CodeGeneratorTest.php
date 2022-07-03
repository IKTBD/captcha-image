<?php
use Iktbd\CaptchaImage\CodeGenerator;
use PHPUnit\Framework\TestCase;

class CodeGeneratorTest extends TestCase
{

    public function testCodeGenerator()
    {
        $length = 5;
        $code = (new CodeGenerator())->codeGenerator($length);
        $this->assertIsString($code);
        $this->assertSame($length, strlen($code));
    }
}
