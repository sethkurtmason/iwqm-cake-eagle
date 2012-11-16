<?php
$this->response->header('Access-Control-Allow-Origin, ''*');
$xml = Xml::fromArray(array('response' => $results));
echo $xml->asXML();
?>