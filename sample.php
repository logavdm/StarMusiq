<?php
$rpp=19;
$link_id = new mysqli('localhost', 'root', '', 'music') or die(mysql_error());
$sql = "SELECT * FROM movies_table WHERE artist='Kamal Haasan'";
$result = $link_id->query($sql);

while ($row=$result->fetch_assoc()) {
                           	

	echo $row['movie_name']."<br>";

                           }                           
                             
                  





?>