<?php


use Iktbd\CaptchaImage\LettersGenerator;
use PHPUnit\Framework\TestCase;

class LettersGeneratorTest extends TestCase
{

    public function testGenerateLetters()
    {
        $word = 'test';

        $letters = (new LettersGenerator)->generateLetters($word, [
            'leftPadding' => 20,
            'letterSpacing' => 40,
        ]);

        $this->assertSame(strlen($word), count($letters));
        $this->assertSame(20, $letters[0]['x']);
        $this->assertSame(60, $letters[1]['x']);
        $this->assertSame(100, $letters[2]['x']);
    }
}
