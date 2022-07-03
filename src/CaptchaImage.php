<?php

namespace Iktbd\CaptchaImage;

class CaptchaImage implements ICaptchaImage
{
    /**
     * @param int $width
     * @param int $height
     * @param array $letters
     * @return false|string
     */
    public function generateImage(int $width, int $height, array $letters): string
    {
        $font = __DIR__ . '/font/Berton-Roman-trial.ttf';

        ob_start();
        $im = imagecreate($width, $height);
        $whiteColor = imagecolorallocate($im, 255, 255, 255);
        $blackColor = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, $width, $height, $whiteColor);
        foreach ($letters as $letter) {
            imagettftext(
                $im,
                $letter['size'],
                $letter['angle'],
                $letter['x'],
                $letter['y'],
                $blackColor,
                $font,
                $letter['text']
            );
        }
        imagepng($im);
        imagedestroy($im);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
