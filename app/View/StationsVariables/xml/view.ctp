<?php
header('Access-Control-Allow-Origin: *');
$xml = Xml::fromArray(array('response' => $results));
echo $xml->asXML();
?>