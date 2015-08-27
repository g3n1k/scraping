<?php
require_once('../scraping.php');
$data = array('name' => 'Ross', 'php_master' => true);
$url = "http://192.168.0.31/target.php";

echo curlGet($url,$data);

getFile('http://it-ebooks.info/images/ebooks/3/head_first_jquery.jpg');
