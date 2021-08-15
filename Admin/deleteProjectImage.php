<?php

include("includes/config.php");
// https://stackoverflow.com/questions/42145786/php-send-data-from-javascript-to-php-using-ajax
if (isset($_POST["p_id"]) ){
    $id = $_POST['p_id'];
    // echo $id;

    $image = $_FILES['myFiles'];
    $fileTmpName  = $_FILES['myFiles']['tmp_name'];
    $fileName = time().''.'.'.$_FILES['myFiles']['name'];

    $targetPath = "img/" . basename($fileName);
    move_uploaded_file($fileTmpName, $targetPath);


    $sql = "UPDATE projectimages SET projectImageName=? WHERE projectimageid=?";
    $stmt= $con->prepare($sql);
    $stmt->bind_param("si", $fileName,$id);
    if($stmt->execute()){
        echo "Success";
    }


}   




?>