<?php
header('Access-Control-Allow-Origin: *');
$this->response->header('Access-Control-Allow-Origin: *');
$json = JSON::fromArray(array('response' => $station));
echo $json->asJSON();
?>