<?php
$xml = Xml::fromArray(array('response' => $variable));
echo $xml->asXML();
?>