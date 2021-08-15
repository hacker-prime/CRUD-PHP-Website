<?php

// https://stackoverflow.com/questions/36834666/how-can-i-get-the-last-row-from-a-table-mysqli
// I want to be able to only use the very last row and the link directly above explains how to do this

$sql = "SELECT * FROM contact ORDER BY id DESC LIMIT 1"; // SQL with parameters
if ($result = mysqli_query($con,$sql)){

    $rowcount = mysqli_num_rows($result);    
 
      if($rowcount > 0){

          // https://www.quora.com/How-do-you-write-JavaScript-code-inside-PHP
          //   https://stackoverflow.com/questions/13688238/javascript-style-display-none-or-jquery-hide-is-more-efficient
          echo 
          "

          <script>

          document.getElementById('contactInfoPlus').style.display = 'block';

          </script>

          "
                      ;  

        $row = mysqli_fetch_array($result);
        $stmt = $con->prepare($sql); 
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_assoc(); // fetch data   

      } else {

   

      }

}

?>