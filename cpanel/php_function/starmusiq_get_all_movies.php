<?php

include('get_functions.php');
include('db_operations.php');

$movieid=5932;
$empty_movie='( FILM)';
$skipped_files=0;
$getted_movies_count=0;

while($movieid<5950){


	if(($movieid>=1 && $movieid <=1741) || ($movieid>=2736 && $movieid <=2762) || ($movieid>=3736 && $movieid <=3750) || ($movieid>=4738 && $movieid <=4741) || ($movieid>=5738 && $movieid <=5940) )
	{
			$mname=get_movies_name(movie_url_builder($movieid));
				similar_text($mname, '( FILM)',$percentage)."-".$percentage."<br>";
				if($percentage<85)
				{

					$movie_description_data=array();
					$movie_description_data=get_movies_descriptions(movie_url_builder($movieid));
					$Acters=explode(',',trim(str_replace('Starring :', '', $movie_description_data[4])));;
					$reyr=str_replace('Year Released :', '', $movie_description_data[5]);
					$img_url=get_movies_poster_image(movie_url_builder($movieid));
					$m_d_320=get_full_movie_zip_download_320(movie_url_builder($movieid));
					$m_d_160=get_full_movie_zip_download_160(movie_url_builder($movieid));
 
					if(insert_movie_details($movieid,$mname,$Acters[0],$reyr,implode(",",$movie_description_data),$img_url,$m_d_320,$m_d_160))
					{
						echo $movieid."-".$mname."-".$img_url."- Insert Success <br><br>";
					}
					else
					{
						echo $movieid."-".$mname."- Insert Failed <br><br>";
					}

				/*	
					$music_name_list_array=get_songs_list(movie_url_builder($movieid));
					$music_id_list_array=get_music_ids(movie_url_builder($movieid));

					$music_index_value=0;
								foreach ($music_name_list_array as $single_music_name) {
    							echo $single_music_name."-".$music_id_list_array[$music_index_value]."<br>";
								//insert_song_details($movieid,$mname,$single_music_name,$music_id_list_array[$music_index_value]);
    							$music_index_value++;
							}
					*/
					$getted_movies_count++;
					
				}
			
			
			

	}
	else
	{
		$skipped_files++;
	}
	
	$movieid++;

}




?>