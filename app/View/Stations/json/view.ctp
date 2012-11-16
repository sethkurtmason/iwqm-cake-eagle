<?php
$json = JSON::fromArray(array('response' => $station));
echo $json->asJSON();
?>