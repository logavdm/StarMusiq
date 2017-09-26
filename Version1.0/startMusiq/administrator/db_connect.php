<?php

include('connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM sample";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["sno"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

//$connection=mysql_connect("127.11.252.130","admintQmFIvk","19KQAcrafwEk") or die("Unable to connect to MySQL");

//$db= mysql_select_db( "parser");

echo "connect success";

?>