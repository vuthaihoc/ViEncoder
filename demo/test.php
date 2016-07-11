<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 7/11/16
 * Time: 10:20
 */

ini_set('display_errors', 1);

require '../vendor/autoload.php';


use StupidDev\ViEncoder\Encoder\Converter;
use StupidDev\ViEncoder\Encoder\Code;


$tcvn3 = file_get_contents(__DIR__ . "/text/tcvn3.txt");
$vni = file_get_contents(__DIR__ . "/text/vni.txt");
$unicode = file_get_contents(__DIR__ . "/text/unicode.txt");
$viqr = file_get_contents(__DIR__ . "/text/viqr.txt");

$output = [
	'from_tcvn3' => [
		'unicode' => Converter::changeEncode($tcvn3, Code::CHARSET_UNICODE),
		'vni' => Converter::changeEncode($tcvn3, Code::CHARSET_VNI_WIN),
		'viqr' => Converter::changeEncode($tcvn3, Code::CHARSET_VIQR),
		'tcvn3' => Converter::changeEncode($tcvn3, Code::CHARSET_TCVN3),
	],
	'from_vni' => [
		'unicode' => Converter::changeEncode($vni, Code::CHARSET_UNICODE),
		'vni' => Converter::changeEncode($vni, Code::CHARSET_VNI_WIN),
		'viqr' => Converter::changeEncode($vni, Code::CHARSET_VIQR),
		'tcvn3' => Converter::changeEncode($vni, Code::CHARSET_TCVN3),
	],
	'from_viqr' => [
		'unicode' => Converter::changeEncode($viqr, Code::CHARSET_UNICODE),
		'vni' => Converter::changeEncode($viqr, Code::CHARSET_VNI_WIN),
		'viqr' => Converter::changeEncode($viqr, Code::CHARSET_VIQR),
		'tcvn3' => Converter::changeEncode($viqr, Code::CHARSET_TCVN3),
	],
	'from_unicode' => [
		'unicode' => Converter::changeEncode($unicode, Code::CHARSET_UNICODE),
		'vni' => Converter::changeEncode($unicode, Code::CHARSET_VNI_WIN, Code::CHARSET_UNICODE),
		'viqr' => Converter::changeEncode($unicode, Code::CHARSET_VIQR, Code::CHARSET_UNICODE),
		'tcvn3' => Converter::changeEncode($unicode, Code::CHARSET_TCVN3, Code::CHARSET_UNICODE),
	]
];

?>
<div>
	<div style="width: 25%; float:left;">
		From TCVN3<br/>
		<?php echo $tcvn3; ?>
	</div>
	<div style="width: 25%; float:left;">
		From VNI<br/>
		<?php echo $vni; ?>
	</div>
	<div style="width: 25%; float:left;">
		From VIQR<br/>
		<?php echo $viqr; ?>
	</div>
	<div style="width: 25%; float:left;">
		From UNICODE<br/>
		<?php echo $unicode; ?>
	</div>
</div>
<h4>Unicode</h4>
<div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_tcvn3']['unicode'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_vni']['unicode'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_viqr']['unicode'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_unicode']['unicode'] ?>
	</div>
</div>
<h4>VNI</h4>
<div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_tcvn3']['vni'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_vni']['vni'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_viqr']['vni'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_unicode']['vni'] ?>
	</div>
</div>
<h4>VIQR</h4>
<div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_tcvn3']['viqr'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_vni']['viqr'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_viqr']['viqr'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_unicode']['viqr'] ?>
	</div>
</div>
<h4>TCVN3</h4>
<div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_tcvn3']['tcvn3'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_vni']['tcvn3'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_viqr']['tcvn3'] ?>
	</div>
	<div style="width: 25%; float:left;">
		<?php echo $output['from_unicode']['tcvn3'] ?>
	</div>
</div>
