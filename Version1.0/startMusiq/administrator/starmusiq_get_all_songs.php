<?php

include('get_functions.php');
include('db_operations.php');

$movieid=5738;
$empty_movie='( FILM)';
$skipped_files=0;
$getted_movies_count=0;
$totalsongs=0;


while($movieid<5950){


	if(($movieid>=1 && $movieid <=1741) || ($movieid>=2736 && $movieid <=2762) || ($movieid>=3736 && $movieid <=3750) || ($movieid>=4738 && $movieid <=4741) || ($movieid>=5738 && $movieid <=5940) )
	{
			$mname=get_movies_name(movie_url_builder($movieid));
				similar_text($mname, '( FILM)',$percentage)."-".$percentage."<br>";
				if($percentage<85)
				{
			
					$music_name_list_array=get_songs_list(movie_url_builder($movieid));
					$music_id_list_array=get_music_ids(movie_url_builder($movieid));

					$music_index_value=0;
								foreach ($music_name_list_array as $single_music_name) {
    							//echo $movieid."-".$single_music_name."-".$music_id_list_array[$music_index_value]."<br>";
								if(insert_song_details($movieid,$mname,$single_music_name,$music_id_list_array[$music_index_value]))
								{
									echo $movieid."-".$single_music_name."-".$music_id_list_array[$music_index_value]."-Success To Insert<br>";
									$totalsongs++;
								}
								else
								{
									echo $movieid."-".$single_music_name."-".$music_id_list_array[$music_index_value]."-Failed To Insert<br>";
								}

    							$music_index_value++;
							}
				

					$getted_movies_count++;
					
				}
			
			
			

	}
	else
	{
		$skipped_files++;
	}
	
	$movieid++;

}

echo "<br><br><br><br><br><br><br>Total Songs Added:-".$totalsongs;


?>