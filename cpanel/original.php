<?php

$connection = mysqli_connect("localhost","root","","music") or die("Error " . mysqli_error($connection));



$sql = "select * from movies_table limit 10";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    

?>