<?php

$sql = "SELECT * FROM aboutimage";
$result = mysqli_query($con,$sql);

if ($result){
    $rowcount = mysqli_num_rows($result);
      
      if($rowcount == 0){
          $fileName2 = "Admin/img/profilephotogif.gif";
      } else {
        //   $fileName2 = "testing";
          while($row = mysqli_fetch_array($result)){
        //   It didn't run due to this line if(file_exists("img/" . $row['name'] ." ") ){ } which wrapped aroundthe code directly below this comment
                $fileName2 = "Admin/img/" . $row['name'] ." ";
        }
      }
      
      
      
}




   

?>




