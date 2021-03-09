<?php 
session_start();
$jsonStr=$_SESSION['jsonData'];
$json=json_decode($jsonStr);
foreach ($json as $key => $value) {?>
<h3><?="$key :"?></h3><p><?="$value"?></p><br>
<?php }?>