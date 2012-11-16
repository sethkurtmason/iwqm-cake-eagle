<?php
$xml = Xml::fromArray(array('response' => $results));
echo $xml->asXML();
?>