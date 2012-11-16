<?php
$json = JSON::fromArray(array('response' => $stations));
echo $json->asJSON();
?>