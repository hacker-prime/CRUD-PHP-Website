<?php

$sql = "SELECT textareaData FROM about"; // SQL with parameters
$stmt = $con->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data   

?>