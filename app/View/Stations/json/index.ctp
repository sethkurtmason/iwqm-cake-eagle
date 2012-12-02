<?php
header('Access-Control-Allow-Origin: *');
$this->response->header('Access-Control-Allow-Origin: *');
$json = JSON::fromArray(array('response' => $stations));
echo $json->asJSON();
?>