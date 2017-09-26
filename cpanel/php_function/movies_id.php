<!DOCTYPE html>
<html>
<head>
  <title>
    
  </title>
</head>
<body>


<?php

include('simple_html_dom.php');

  $burl="http://www.starmusiq.com/tamil_movie_songs_listen_download.asp?MovieId=";
  $mid=1;

  while ($mid!=10000) {

    $furl=$burl.$mid;
    $html = file_get_html($furl);

      $count=0;
        foreach($html->find('table.main_tb2 td h1') as $article) {
          if($count==2)
          echo $mid."-".$article->innertext."<br>";
          $count++;
        }

$count=0;


        

//songs start




  $s_count=0;
              $i=0;
                foreach($html->find('table.main_tb2 tr h2') as $article) {
                  if($s_count>4)
                {
                echo " ".$i." - ".$article->innertext."  - ";
                $i++;
                $j=0;
                foreach($html->find('table.main_tb2 tr a') as $article) {
               if($article->innertext=="Download")
                {$j++;}
                        if($i==$j){
                          $matches=filter_var($article ->href, FILTER_SANITIZE_NUMBER_INT);
                          echo " ".$matches."-".$article ->href."<br> ";break;}
                         }
                }
                $s_count++;
                echo " ";
               
                }

                echo "<br>";





//songs end






















    $mid++;
    
  }


?>
</body>
</html>