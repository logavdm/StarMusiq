<?php

include('get_functions.php');





$connection = mysqli_connect("localhost","root","","music") or die("Error " . mysqli_error($connection));

$movies_list=array();
$songs_list=array();
$final_list=array();

$sql = "select * from new_movie_check limit ".$_GET['limit'].",".$_GET['offset'];
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $movies_details=array();

while($row =mysqli_fetch_assoc($result))
    {

        $movie_name=get_movies_name(movie_url_builder('6176'));

        if ($movie_name!='')
        {
        	$movie_description_data=get_movies_descriptions(movie_url_builder(6176));
			$Acters=explode(',',trim(str_replace('Starring :', '', $movie_description_data[4])));;
			$reyr=str_replace('Year Released :', '', $movie_description_data[5]);
			$img_url=get_movies_poster_image(movie_url_builder(6176));
			$m_d_320=get_full_movie_zip_download_320(movie_url_builder(6176));
			$m_d_160=get_full_movie_zip_download_160(movie_url_builder(6176));

			$movie=array('movie_id'=>'6176','movie_name'=>$movie_name,'artist'=>$Acters[0],'release_year'=>$reyr,'get_movies_poster_image'=>$img_url,'movie_tumb_image'=>$img_url,'url_320'=>$m_d_320,'url_160'=>$m_d_160);

			$songsid=get_music_ids(movie_url_builder(6176));
			$songs_name=get_songs_list(movie_url_builder(6176));


			$songslist=array();

			$index=0;

			foreach ($songsid as $sid) {
				$songslist[]=array('song_id'=>$songsid[$index],'song_name'=>$songs_name[$index]);

				$index++;
			}

			

			$movies_list[]=array('movie'=>$movie,'songs'=>$songslist);


        	

        }else
        {
        	echo "null movie"."<br>";
        }
        

    }

    $records=array('records'=>$movies_list);

echo json_encode($records);

?>