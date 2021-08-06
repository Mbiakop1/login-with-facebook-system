<?php
session_start();
require_once "./Facebook/autoload.php";

$FB = new \Facebook\Facebook([
            'app_id' => "671488547402472",
            'app_secret' => "2a6adc253aa64baaae00245ae7eb91c7",
            'default_graph_version' => "v11.0",
]);


$helper = $FB->getRedirectLoginHelper();

?>