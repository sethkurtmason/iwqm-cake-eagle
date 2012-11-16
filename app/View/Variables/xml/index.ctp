<?php
$xml = Xml::fromArray(array('response' => $variables));
echo $xml->asXML();
?>