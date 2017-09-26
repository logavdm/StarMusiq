<html>


<head>

</head>

<body>




<?php


include "simple_html_dom.php";
include "functions.php";


set_time_limit(0);

//$url ='http://tamilyogi.com/manithan-2016-hd-720p-tamil-movie-watch-online/' ;




 


/*

$pcount=1;

while($pcount!=14)
{
  
  if($pcount==1)
  	{

  		$furl="http://tamilyogi.com/category/tamilyogi-bluray-movies-o/";

    	$html = file_get_html($furl);

        foreach($html->find('li h2') as $article) {
          
          echo $article->innertext."<br>";
          
      	}

      	foreach ($html->find('li img') as $article) {
      		
      		echo $article->src."<br>";
      	}

      	echo "<br><br><br><br>".$count." Page Content<br><br><br>";
  	}

  	else
  	{
  		$furl="http://tamilyogi.com/category/tamilyogi-bluray-movies-o/page/".$pcount."/";

  		$html = file_get_html($furl);

        
      	foreach ($html->find('li img') as $article) {
      		
      		echo $article->src."<br>";
      	}

      	echo "<br><br><br><br>".$count." Page Content<br><br><br>";

  	}
 

$pcount++;
}

*/

$page_count=1;

while ($page_count!=14) {
  

if ($page_count==1) {
 $furl="http://tamilyogi.com/category/tamilyogi-bluray-movies-o/";
}
else
$furl="http://tamilyogi.com/category/tamilyogi-bluray-movies-o/page/".$page_count."/";


  
      
      $html = file_get_html($furl);
      $mcount=1;
      foreach($html->find('li h2 a') as $article) {
        $mname=get_movie_name_without_string($article->innertext);
        $p_img=get_movie_image($html,$mcount);
        $yr=find_out_year($article->innertext);
        $cat="Tamil";
        $qlt=get_quality($article->innertext);
        $dp=get_iframe_src($article->href);

       if(insert_video_db($mname,$p_img,$yr,$cat,$qlt,$dp))
       {
          echo "Db Add Success-".$mname."<br>";
       }
       else
       {
          echo "Db Add Failed-".$mname."<br><br>";
       }
        


      $mcount++;          
      }




$page_count++;
}

  


//echo get_iframe_src("http://tamilyogi.com/manithan-2016-hd-720p-tamil-movie-watch-online/");



function get_iframe_src($url)
{

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);
preg_match_all('/<iframe[^>]+src=([\'"])(.+?)\1[^>]*>/i', $data, $result);

return $result[2][0];

}

function get_iframe_src_2($url)
{

$html = file_get_html($url);
foreach($html->find('iframe') as $article)
{
  return $article->src;
}

return "error";
}




function get_movie_image($html,$cnt)
{

		$count=1;
foreach ($html->find('li img') as $article) {
      	if($count==$cnt)
      	  return $article->src;
          $count++;
      	
      	}
return "error";


}


function get_year_array($movies_name,$cnt)
{

$count=0;
foreach ($movies_name as $mve) {
  if($count==$cnt)
	return find_out_year($mve);
	$count++;
}
return "error";
}



function find_out_year($text)
{
preg_match_all("/\(([^\]]*)\)/", $text, $matches);
return $matches[1][0];
}



function get_movie_name_without_string($text)
{
return strstr($text,'(',true);
}


function get_quality($text)
{

	return strstr(strstr($text,'HD',false),'Tamil',true);
}





function insert_video_db($video_name,$poster_img,$release_year,$category,$quality,$dp)
{
$conn=connect_db();

$sql = "INSERT INTO videos (video_name, v_poster_image,v_release_year,v_category,quality,d_page)
VALUES ('$video_name', '$poster_img', '$release_year','$category','$quality','$dp')";

if ($conn->query($sql) === TRUE) {
    return 1;
} else {
    return 0;
}

$conn->close();


}









?>




</body>
</html>
