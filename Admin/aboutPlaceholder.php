<?php


// https://phpdelusions.net/mysqli_examples/prepared_select
$sql = "SELECT textareaData FROM about"; // SQL with parameters
$stmt = $con->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data   

?>