<?php 
$this->response->header('Access-Control-Allow-Origin, ''*');
echo $scripts_for_layout; ?>
<script type="text/javascript"><?php echo $this->fetch('content'); ?></script>
