<?php
$json = JSON::fromArray(array('response' => $results));
echo $json->asJSON();
?>