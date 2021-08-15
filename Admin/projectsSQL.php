<?php
        //inspired by cartContent.php from thephynix application
        // https://www.youtube.com/watch?v=S-JG1z6Bp3U&lc=Ugw24SpVvtrtAXZDwrV4AaABAg.9OBho8SGcWp9OCfAOXSRO2 (Create a foreign key in phpmyadmin and relate to primary key)
        // https://dba.stackexchange.com/questions/129023/selecting-data-from-another-table-using-a-foreign-key  
        
        
        
             
        // $resultA = mysqli_query($con,"SELECT projects.*,projectimages.projectImageName,projectimages.projects_fk FROM projects
        //                              INNER JOIN projectimages ON projects.projectid=projectimages.projects_fk");
        // // https://www.w3schools.com/Php/func_mysqli_fetch_all.asp
        // $resultArray = mysqli_fetch_all($resultA, MYSQLI_ASSOC);   


        // $generalresult = mysqli_query($con, "SELECT * FROM projects");
        // $resultArray2 = mysqli_fetch_all($generalresult, MYSQLI_ASSOC);

        // $generalresult2 = mysqli_query($con, "SELECT * FROM projectimages");
        // $resultArray2 = mysqli_fetch_all($generalresult2, MYSQLI_ASSOC);

        // $generalresult3 = mysqli_query($con, "SELECT * FROM projectimages");
        // $resultArray2 = mysqli_fetch_all($generalresult3, MYSQLI_ASSOC);


        // $generalresult4 = mysqli_query($con,"SELECT projectImageName FROM projectimages
        //                              LEFT JOIN projects ON projectimages.projects_fk=projects.projectid");
        // // https://www.w3schools.com/Php/func_mysqli_fetch_all.asp
        // $resultArray = mysqli_fetch_all($generalresult4, MYSQLI_ASSOC);   

 
?>  