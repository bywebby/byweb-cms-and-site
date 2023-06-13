<?php
define('_SAPE_USER', '7613230a4dfedc50daddd763f33b1833');
require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php');

$sape_articles = new SAPE_articles();

echo $sape_articles->process_request();
