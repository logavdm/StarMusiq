
<?php

include('simple_html_dom.php');
$mveurl="http://www.starmusiq.com/tamil_movie_songs_listen_download.asp?MovieId=1";


function get_songs_list($mveurlname)
{
$skip_value=0;
$html_music_name = file_get_html($mveurlname);
$music_list_array=array();
$index_value=0;
foreach($html_music_name->find('table.main_tb2 tr h2') as $music_name) {
if($skip_value>4){
$music_list_array[$index_value]=$music_name->innertext;
$index_value++;
}
$skip_value++;
}
return $music_list_array;
}


function get_music_ids($mveurlid)
{
  $html_get_music_id = file_get_html($mveurlid);
  $music_ids_list=array();
  $music_ids_index=0;
    foreach($html_get_music_id->find('table.main_tb2 tr a') as $m_id) {
          if($m_id->innertext=="Download")
            {
             $music_ids_list[$music_ids_index]=$m_id->href;
              $music_ids_index++;
            }
      }
  return $music_ids_list;

}



function movie_url_builder($movie_id_fun)
{
$movies_page_base_url="http://www.starmusiq.com/tamil_movie_songs_listen_download.asp?MovieId=";
$movies_page_merged_full_url=$movies_page_base_url.$movie_id_fun;
return $movies_page_merged_full_url;
}

function song_url_builder($song_id_fun)
{
$songs_download_base_url="http://www.starmusiq.com/download/?songID=";
$songs_download_merged_full_url=$songs_download_base_url.$song_id_fun;
return $songs_download_merged_full_url;
}





function get_movies_name($movie_title_fun)
{
$movies_title_count=0;
$html_get_movie_title_name = file_get_html($movie_title_fun);
foreach($html_get_movie_title_name->find('table.main_tb2 td h1') as $mve_title) {
    if($movies_title_count==2)
      { 
       return $mve_title->innertext;
       break;
      }
    $movies_title_count++;
}
}

$data=get_movie_poster_image($mveurl);

function get_movie_poster_image($mve_url_poster_fun)
{

$html_get_movie_poster_image = file_get_html($mve_url_poster_fun);

	foreach($html_get_movie_poster_image->find('img') as $mve_poster) {

		echo "<img src='http://www.starmusiq.com/".$mve_poster->src."'/><br>;
	}

}        



?>



