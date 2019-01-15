<?php
include '../Unilib.php';
$init = new Unilib(["username"=>"XXXX","password"=>"XXXX"]);
$res = $init->get('profile','div[class=inputbox]');
var_dump($res[0]->innertext);
?>
