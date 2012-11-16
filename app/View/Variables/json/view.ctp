<?php
$this->response->header('Access-Control-Allow-Origin, ''*');
$json = JSON::fromArray(array('response' => $variable));
echo $json->asJSON();
?>