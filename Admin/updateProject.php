<?php

include("includes/config.php");

if ( isset($_POST["input"]) || isset($_POST["textarea"]) || isset($_POST["formID"]) ){
    $input = $_POST['input'];
    $textarea = $_POST['textarea'];
    $formID = $_POST['formID'];

    $sql = "UPDATE projects SET projectName=?,description=? WHERE projectid=?";
    $stmt= $con->prepare($sql);
    $stmt->bind_param("ssi", $input,$textarea,$formID);
    if($stmt->execute()){
        echo "Successfully updated project :)";
    }

}


?>