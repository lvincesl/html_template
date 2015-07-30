<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use lvincesl\html\Html_template;

$html_template = new Html_template( __DIR__ . '/test.html');
$html_template->set("NAME", "LIONEL");
echo $html_template->toString();
