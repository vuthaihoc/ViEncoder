<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 6/30/16
 * Time: 08:07
 */

namespace StupidDev\ViEncoder\Encoder;


class Detector {
	private static $patterns = [
		Code::CHARSET_TCVN3        => '/\w­[¬íêîëì]|®[¸µ¹¶·Ê¾»Æ¼½ÌÑÎÏªÕÒÖÓÔÝ×ÞØÜãßäáâ«èåéæç¬íêîëìóïôñòøõùö]/u',
		Code::CHARSET_VNI_WIN      => '/[öô][ùøïûõ]|oa[ëùøïûõ]|ñ[aoeuôö][äàáåãùøïûõ]/iu',
		Code::CHARSET_VIQR         => '/u[\+\*]o[\+\*]|dd[aoe][\(\^~\'`]|[aoe]\^[~`\'\.\?]|[uo]\+[`\'~\.\?]|a\([\'`~\.\?]/iu',
		Code::CHARSET_UNICODE      => '/[Ạ-ỹ]/',
		Code::CHARSET_VISCII       => '/\wß[½¾¶þ·Þ]|ð[áàÕäã¤í¢£ÆÇè©ë¨êª«®¬­íì¸ïîóò÷öõô¯°µ±²½¾¶þ·ÞúùøüûÑ×ñØ]/u',
		Code::CHARSET_VPS_WIN      => '/\wÜ[Ö§©®ª«]|Ç[áàåäãÃí¢¥£¤èËÈëêÍíìÎÌïóòÕõôÓÒ¶°Ö§©®ª«úùøûÛÙØ¿º]/u',
		Code::CHARSET_VIETWARE_F   => '/\w§[¥ìéíêë]|¢[ÀªÁ¶ºÊÛÂÆÃÄÌÑÍÎ£ÕÒÖÓÔÛØÜÙÚâßãàá¤çäèåæ¥ìéíêëòîóïñ÷ôøõ]/u',
		Code::CHARSET_VIETWARE_X   => '/[áãä][úöûøù]|à[õòûóô]|[åæ][ïìüíî]/iu',
//		Code::CHARSET_BKHCM1       => '/\wõ[ïðñôòó]|\s½[ÚÛÃÄÇÈÉÊÑÐíôóÒÓÔÕ]/u',
//		Code::CHARSET_BKHCM2       => '/\w[êöï][ëìåíî]|úû[áâåãä]|ù[æçåèé]/iu',
//		Code::CHARSET_VNU          => '/\wõ[çèéìêë]|\s½[?¡­¨¬µ¶·º¸¹¯°±´²³]/u',
//		Code::CHARSET_COMB_UNICODE => '/[̣́̀̉̃]/iu',
//		Code::CHARSET_UTF8         => '/(áº|á»)[¥¤§¦¬©¨«ª¯®±°·¶³²º½¼¾¿¡£¢]/ui',
//		Code::CHARSET_ESC_UNICODE  => '/&#\d\d\d\d;/iu',
	];

	/**
	 * Chú ý đến thức tự để detect không được thay đổi, không hỗ trợ thì comment lại
	 * @var array
	 */
	private static $codes_supported = [
//		"VNU",
//		"B.K. HCM 2",
//		"B.K. HCM 1",
		"VietWare-X",
		"VietWare-F",
		"VIQR",
		"VPS-Win",
		"VISCII",
		"TCVN-3",
		"VNI-WIN",
//		"&#Unicode;",
//		"UTF-8",
//		"Unicode to hop",
		Code::CHARSET_UNICODE,
	];

	/**
	 * @param $code
	 *
	 * @return bool
	 */
	public static function isSupported($code){
		return in_array($code, self::$codes_supported);
	}

	/**
	 * @param $string
	 * @param string|null $code if null, auto detect the code
	 *
	 * @return int 0: not match, 1: match, false: error
	 */
	public static function usingCode($string, $code = null){
		if($code !== null && self::isSupported($code)){
			return preg_match(self::$patterns[$code], $string);
		}else{
			foreach(self::$codes_supported as $code){
//				\Log::alert("Checking " . $code);
				if(preg_match(self::$patterns[$code], $string)){
					return $code;
				}
			}
			return false;
		}
	}
}