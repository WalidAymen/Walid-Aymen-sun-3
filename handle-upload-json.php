<?php
session_start();
if(isset($_POST['submit'])) {
    $json=$_FILES['json'];
    $jsName=$json['name'];
    $jsTmpName=$json['tmp_name'];
    $jsError=$json['error'];
    $jsSize=$json['size'];
    $ext=pathinfo($jsName,PATHINFO_EXTENSION);
    if ($jsError>0) {
        $error='upload error please try again';
        $_SESSION['error']=$error;
        header("location: upload-json.php");

    } elseif ($ext!='json') {
        $error='Wrong file extention';
        $_SESSION['error']=$error;
        header("location: upload-json.php");
    }else {
        $randstr=uniqid();
        $jsNewName="$randstr.$ext";
        move_uploaded_file($jsTmpName,"uploads/$jsNewName");
        $jsonFile=fopen("uploads/$jsNewName",'a+');
        $jsonFileData=fread($jsonFile,filesize("uploads/$jsNewName"));
        $_SESSION['jsonData']=$jsonFileData;
        header("location: display.php");
    }
}


?>