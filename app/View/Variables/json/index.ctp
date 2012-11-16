<?php
$json = JSON::fromArray(array('response' => $variables));
echo $json->asJSON();
?>