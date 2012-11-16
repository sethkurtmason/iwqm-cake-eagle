<?php
$xml = Xml::fromArray(array('response' => $station));
echo $xml->asXML();
?>