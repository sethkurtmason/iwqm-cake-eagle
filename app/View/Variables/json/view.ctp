<?php
$json = JSON::fromArray(array('response' => $variable));
echo $json->asJSON();
?>