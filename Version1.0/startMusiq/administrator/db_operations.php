<?php

include('connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 





function insert_movie_details($m_id,$m_name,$m_artist,$m_release_year,$m_desc,$m_img,$data_url_320,$data_url_160)
{
	$conn = new mysqli('127.11.252.130', 'admintQmFIvk', '19KQAcrafwEk', 'parser');
	$query="INSERT INTO movies_table (movie_id,movie_name,artist,release_year,movie_description,movie_poster_image,url_320,url_160) VALUES('$m_id','$m_name','$m_artist','$m_release_year','$m_desc','$m_img','$data_url_320','$data_url_160')";
	if (mysqli_query($conn, $query)) {
    return 1;
	} else {
    return 0;
	}
	$conn->close();

}






function insert_song_details($mv_id,$mv_name,$s_name,$s_id)
{

		$conn = new mysqli('127.11.252.130', 'admintQmFIvk', '19KQAcrafwEk', 'parser');
		$query_songs="INSERT INTO songs_table (m_id,m_name,song_name,song_id) VALUES('$mv_id','$mv_name','$s_name','$s_id')";
		if (mysqli_query($conn, $query_songs)) {
    	return 1;
		} else {
    	return 0;
		}

$conn->close();
}






$conn->close();


?>