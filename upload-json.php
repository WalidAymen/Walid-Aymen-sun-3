<?php
session_start();
if (isset($_SESSION['error']))
{
?>
<h3 style="color: red;"><?=$_SESSION['error']?></h3>
<?php 
unset($_SESSION['error']); }?>
<form action="handle-upload-json.php" enctype="multipart/form-data" method="post">
<h1>Upload the JSON file :</h1> <br>
<input type="file" name="json">
<br>
<input type="submit" value="upload" name="submit">

</form>