<?php
$this->response->header('Access-Control-Allow-Origin, ''*');
$json = JSON::fromArray(array('response' => $stations));
echo $json->asJSON();
?>