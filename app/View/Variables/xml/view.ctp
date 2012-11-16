<?php
$this->response->header('Access-Control-Allow-Origin, ''*');
$xml = Xml::fromArray(array('response' => $variable));
echo $xml->asXML();
?>