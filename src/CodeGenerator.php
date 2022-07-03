<?php

namespace Iktbd\CaptchaImage;

class CodeGenerator implements ICodeGenerator
{
    /**
     * @param int $length
     * @return string
     */
    public function codeGenerator(int $length): string
    {
        $letters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));

        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $randNumber = rand(0, count($letters)-1);
            $result .= $letters[$randNumber];
        }

        return $result;
    }
}
