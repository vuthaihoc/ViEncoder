<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 5/9/18
 * Time: 14:27
 */

use StupidDev\ViEncoder\Encoder\Code;
use StupidDev\ViEncoder\Encoder\Converter;

require_once __DIR__ . "/../vendor/autoload.php";

$vf = "ÑÖÙC HIEÁU SINH YÙ HAØNH, KHAÅU HAØNH, THAÂN HAØNH";

echo \StupidDev\ViEncoder\Encoder\Detector::usingCode( $vf);

echo "<br/>";

$unicode = Converter::changeEncode($vf, Code::CHARSET_UNICODE);

print_r( $unicode);