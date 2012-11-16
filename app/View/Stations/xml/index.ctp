<?php
$xml = Xml::fromArray(array('response' => $stations));
echo $xml->asXML();
?>