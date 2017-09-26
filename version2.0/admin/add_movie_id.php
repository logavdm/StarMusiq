<?php




$conn = new mysqli('localhost', 'root', '', 'music');

$sql = "SELECT movie_id FROM movies_table DES";
$result = $conn->query($sql);

		if ($result->num_rows > 0) 
			{
                while($row = $result->fetch_assoc())
                     {
                     	$m=$row['movie_id'];
                     	$query="DELETE  FROM new_movie_check WHERE mid='$m'";
                     		if (mysqli_query($conn, $query))
							{
								echo $row['movie_id']." delete Success<br>";
							}
							else
							{
								echo $row['movie_id']." delete failed<br>";
							}

                     }

             }






?>
