<?php
header('Access-Control-Allow-Origin: *');
$xml = Xml::fromArray(array('response' => $stations));
echo $xml->asXML();
?>