<?php

include('simple_html_dom.php');

  $burl="http://www.starmusiq.com/tamil_movie_songs_listen_download.asp?MovieId=";
  $mid=5857;

  while ($mid!=10000) {

    $furl=$burl.$mid;
    $html = file_get_html($furl);

      $count=0;
        foreach($html->find('table.main_tb2 td h1') as $article) {
          if($count==2){
          echo $mid."-".$article->innertext."<br>";}
          $count++;
        }

$count=0;

$mid++;
    
  }


?>