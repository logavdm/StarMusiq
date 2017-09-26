<?php 


include "functions.php";


function compress_image($src, $dest , $quality) 
{
	$info = getimagesize($src);
 
	if ($info['mime'] == 'image/jpeg') 
	{
		$image = imagecreatefromjpeg($src);
	}
	elseif ($info['mime'] == 'image/gif') 
	{
		$image = imagecreatefromgif($src);
	}
	elseif ($info['mime'] == 'image/png') 
	{
		$image = imagecreatefrompng($src);
	}
	else
	{
		echo 'Unknown image file format';
	}
 
	//compress and save file to jpg
	imagejpeg($image, $dest, $quality);
 
	//return destination file
	return $dest;
}
 
//usage


/*
$conn=connect_db();

$sql="SELECT * FROM movies_table WHERE movie_tumb_image=''";

$result = $conn->query($sql);


while($row=$result->fetch_assoc())
{

$bn=basename($row['movie_poster_image']);
$url=$row['movie_poster_image'];
	$compressed=compress_image($url,'../images/songs/'.$bn, 50);
	if(updateimg("images/songs/".$bn,$row['movie_id']))
	echo "<br>".$row['movie_name']."Update Success";





$compressed=compress_image('http://www.starmusiq.com/movieimages/Tamil/P/2009/Peranmai_B.jpg','../images/songs/'.basename('http://www.starmusiq.com/movieimages/Tamil/P/2009/Peranmai_B.jpg'), 50);

if(updateimg(basename('http://www.starmusiq.com/movieimages/Tamil/P/2009/Peranmai_B.jpg'),94))
	echo "<br>".$row['movie_name']."Update Success";


}
*/


$conn=connect_db();

$sql="SELECT * FROM movies_table WHERE movie_tumb_image=''";

$result = $conn->query($sql);

while($row=$result->fetch_assoc())
{


$compressed=compress_image($row['movie_poster_image'],'../images/songs/'.basename($row['movie_poster_image']), 50);

if(updateimg(basename($row['movie_poster_image']),$row['movie_id']))
	echo "<br>".$row['movie_name']."Update Success";



}



function updateimg($desimg,$mid)
{

$conn=connect_db();

$sql="UPDATE movies_table SET movie_tumb_image='$desimg' WHERE movie_id='$mid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
    return 1;
} else {
    echo "<br>Error updating record: " . $conn->error;
    return 0;
}

$conn->close();


}



//$compressed = compress_image('http://www.starmusiq.com/movieimages/Tamil/J/Jodhaa-Akbar_B.jpg', '../images/songs/destination.jpg', 50); 


?>