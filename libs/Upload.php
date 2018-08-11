<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 25/05/16
 * Time: 16:53
 */
class Upload
{

    public static function upload_jpg($tmp, $nome, $largura, $a, $pasta)
    {
        $img = imagecreatefromjpeg($tmp);
        $x = imagesx($img);
        $y = imagesy($img);
        $altura = ($largura * $y) / $x;
        $nova = imagecreatetruecolor($largura, $a);

        imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $a, $x, $y);
        imagejpeg($nova, "$pasta/$nome");
        imagedestroy($nova);
        imagedestroy($img);
        return ($nome);
    }

    public static function upload_png($tmp, $nome, $largura, $a, $pasta)
    {
        $img = imagecreatefrompng($tmp);
        $x = imagesx($img);
        $y = imagesy($img);
        $altura = ($largura * $y) / $x;
        $nova = imagecreatetruecolor($largura, $a);

        imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $a, $x, $y);
        imagepng($nova, "$pasta/$nome");
        imagedestroy($nova);
        imagedestroy($img);
        return ($nome);
    }
}
