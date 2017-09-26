
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
$music_list_array[$index_value]=str_replace('- StarMusiQ.Com', '',$music_name->innertext);
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
             $music_ids_list[$music_ids_index]=str_replace('download/?songID=', '',$m_id->href);
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
       return trim(preg_replace('/[\[{\(].*[\]}\)]/U' , '',str_replace("Full Cast & Crew", "", "$mve_title->innertext")));
       break;
      }
    $movies_title_count++;
}
}

//$data=get_movies_poster_image("http://www.starmusiq.com/tamil_movie_songs_listen_download.asp?MovieId=1");

//echo $data;

function get_movies_poster_image($movie_poster_url_fun)
{
	$html_get_movie_poster_url_image = file_get_html($movie_poster_url_fun);
	foreach($html_get_movie_poster_url_image->find('td div[align=justify] img') as $mve_poster_single) {
		return "http://www.starmusiq.com".$mve_poster_single->src;
	}
}



function get_movies_descriptions($movies_description_url_fun)
{
	$movies_description_array=array();
	$movies_description_index_value=0;
	$html_get_movies_desc_url = file_get_html($movies_description_url_fun);
	$movie_description_count=0;

	 foreach($html_get_movies_desc_url->find('table.main_tb2 tr p') as $description_single_line) {
            if($movie_description_count<8)
            	{
            	    $movies_description_array[$movies_description_index_value]=$description_single_line->plaintext;
            		$movies_description_index_value++;

            	}
            $movie_description_count++;
            }
 	
            return  $movies_description_array ;
}


function get_full_movie_zip_download_160($download_160_mve_url_fun)
{
	$html_get_movies_download_url_page = file_get_html($download_160_mve_url_fun);
	$download_160_count=0;
	foreach($html_get_movies_download_url_page->find('table[width=400] a') as $full_movie_download_link) {
               if($download_160_count==1)
                return $full_movie_download_link->href;
               $download_160_count++;
                }
}


function get_full_movie_zip_download_320($download_320_mve_url_fun)
{
		$html_get_movies_download_320_url_page = file_get_html($download_320_mve_url_fun);
	foreach($html_get_movies_download_320_url_page->find('td[width=320] a') as $download_link_320) {
              
                return $download_link_320->href;
                
                }

}

?>



