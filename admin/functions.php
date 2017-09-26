<?php

function connect_db()
{

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));

$dbhost = constant("DB_HOST"); // Host name 
$dbport = constant("DB_PORT"); // Host port
$dbusername = constant("DB_USER"); // Mysql username 
$dbpassword = constant("DB_PASS"); // Mysql password 
$db_name = constant("DB_NAME"); // Database name 



$conn = new mysqli('127.11.252.130', 'admintQmFIvk', '19KQAcrafwEk', 'parser');
return $conn;

}

  function get_latest_movies_list()
  {

  	$conn = connect_db();
  	$sql = "SELECT * FROM movies_table ORDER BY sno DESC LIMIT 12  ";
  	  $result = $conn->query($sql);
  	  if ($result->num_rows > 0) {
  	  	return $result;
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }



  function get_random_song_list()
  {
  	$conn = connect_db();
	$sql="SELECT * FROM songs_table ORDER BY RAND() LIMIT 8";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  	  	return $result;
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }


  function get_movie_poster_image($movie_id_get)
{
	$conn = connect_db();
	$sql="SELECT * FROM movies_table WHERE movie_id='$movie_id_get'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row['movie_tumb_image'];
	}
	else
	{
		return "error";
	}
	
}

function get_star_list_for_homepage()
{

$conn = connect_db();
$sql="SELECT artist,COUNT(*) as count FROM movies_table GROUP BY artist ORDER BY count DESC LIMIT 10";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	return $result;
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

}

function get_movie_release_year_by_movieid($mveid)
{
$conn = connect_db();
$sql="SELECT * FROM movies_table WHERE movie_id='$mveid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	return $row['release_year'];

	}

	else
		return "error";

}

function get_movie_release_year_by_songid($sngid)
{

$mveid=get_movieid_by_songid($sngid);
	if ($mveid!="error") {


			$conn = connect_db();
			$sql="SELECT * FROM movies_table WHERE movie_id='$mveid'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['release_year'];

			}

			else
			return "error";

}

else
{

return "error";

}

}




function get_movie_with_id($mov)
{
	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE movie_id='$mov'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	return $result;
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

}

function get_song_details_with_songid($sng)
  {

  	$conn = connect_db();
  	$sql="SELECT *  FROM songs_table WHERE song_id='$sng'";
  	$result = $conn->query($sql);
  	if ($result->num_rows > 0) {
	return $result;
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

  function get_artist_by_movieid($mve)
  {

  	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE movie_id='$mve'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	return $row['artist'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

  function get_movie_name_by_movieid($mve)
  {

  	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE movie_id='$mve'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	return $row['movie_name'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

function get_song_name_by_songid($sngid)
  {

  	$conn = connect_db();
	$sql="SELECT *  FROM songs_table WHERE song_id='$sngid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	return $row['song_name'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

  function get_movieid_by_songid($sngid)
  {

  	$conn = connect_db();
	$sql="SELECT *  FROM songs_table WHERE song_id='$sngid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	return $row['m_id'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

  function get_movie_name_by_song_id($sngid)
  {

  	
  		$conn = connect_db();
  		$sql="SELECT *  FROM songs_table WHERE song_id='$sngid'";
  		$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
					$row = $result->fetch_assoc();
					return $row['m_name'];
  	  		}
  			else
  				return "error";
  
  }

  function get_movie_description_by_song_id($sngid)
  {

  		$mve=get_movieid_by_songid($sngid);

  		if ($mve!="error") {
  			$conn = connect_db();
  			$sql="SELECT *  FROM movies_table WHERE movie_id='$mve'";
  			$result = $conn->query($sql);
  				if ($result->num_rows > 0) 
					{
						$row = $result->fetch_assoc();
						return $row['movie_description'];
  	  				}
  				else
  					return "error";
  		}
  		else
  			return "error";
  
  }


function get_movie_description_by_movie_id($mve)
  {

  
  			$conn = connect_db();
  			$sql="SELECT *  FROM movies_table WHERE movie_id='$mve'";
  			$result = $conn->query($sql);
  				if ($result->num_rows > 0) 
					{
						$row = $result->fetch_assoc();
						return $row['movie_description'];
  	  				}
  				else
  					return "error";
  }

  function get_a_z_movies()
{

$alphabets=array('num','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$count_alpha=array();
$count=0;
foreach ($alphabets as $letter) {
	$count_alpha[$count]=get_movies_count_like_single_alphabet($letter);
	$count++;
}

$returnvalue='';
$count=0;
foreach ($alphabets as $letter) {
	if($count==0)
	$returnvalue=$returnvalue."<a onclick=\"filter_post_method('','artist','".$letter."','1')\"class=\"list-group-item\"> 0 - 9<label class=\" label bg-info dk m-l-xs pull-right\">".$count_alpha[$count]."</label></a>";
   else
   	$returnvalue=$returnvalue."<a onclick=\"filter_post_method('','artist','".$letter."','1')\"class=\"list-group-item\"> ".$letter."<label class=\" label bg-info dk m-l-xs pull-right\">".$count_alpha[$count]."</label></a>";

	$count++;
}


return $returnvalue;


}



function get_movies_count_like_single_alphabet($filter)
{
$conn = connect_db();
if($filter=='num')
{
	$sql="SELECT COUNT(*) as total FROM movies_table WHERE movie_name REGEXP '^[0-9]'";
}
else
$sql="SELECT COUNT(*) as total FROM movies_table WHERE movie_name LIKE '$filter%'";
$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];
}

  		

  function get_song_list_by_movie_id($mve)
  {

  
  			$conn = connect_db();
  			$sql="SELECT *  FROM songs_table WHERE m_id='$mve'";
  			$result = $conn->query($sql);
  				if ($result->num_rows > 0) 
					{
						
						return $result;
  	  				}
  				else
  					return "error";
  }

function get_song_list_by_song_id($sngid)
  {

  		$mve=get_movieid_by_songid($sngid);
  		if ($mve!="error") {
  			$conn = connect_db();
  			$sql="SELECT *  FROM songs_table WHERE m_id='$mve'";
  			$result = $conn->query($sql);
  				if ($result->num_rows > 0) 
					{
						
						return $result;
  	  				}
  				else
  					return "error";
  		}
  		else
  			return "error";
  
  			
  }



  function get_star_movie_count_by_starname($strnme)
  {

  	$conn = connect_db();
	$sql="SELECT COUNT(*) as total FROM movies_table WHERE artist='$strnme'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	return $row['total'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

  function get_release_year_by_movieid($mve)
  {

  	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE movie_id='$mov'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	return $row['release_year'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

 function get_movies_by_star_filter($star_name)
 {
 		$conn = connect_db();
 		$sql="SELECT *  FROM movies_table WHERE artist='$star_name'";
 		$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		return $result;
	}
	else
	return "error";


 }

function get_320kbps_download_by_movieid($mve)
  {

  	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE movie_id='$mve'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	return $row['url_320'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }

 function get_160kbps_download_by_movieid($mve)
  {
  	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE movie_id='$mve'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	return $row['url_160'];
  	  }
  	  else
  	  {
  	  	return "error";
  	  }

  }


function trim_song_name($song_name)
{
	if(strstr($song_name,'-',true)!='')
	return strstr($song_name,'-',true);
	else
	return $song_name;

}

function get_suggestion_list_movie()
{
	$conn=connect_db();
	$sql="SELECT * FROM movies_table ORDER BY RAND() LIMIT 10";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	}
	else
	{
		return "error";
	}

}



function paginate_year($reload, $page, $tpages, $adjacents,$filter_year) {
	
	$prevlabel = "<i class=\"fa fa-chevron-left\"></i>";
	$nextlabel = "<i class=\"fa fa-chevron-right\"></i>";
	
	$out = "<ul class=\"pagination pagination\">\n";
	
	// previous
	if($page==1) {
		$out.= "<li><a>" . $prevlabel . "</a></li>\n";
	}
	elseif($page==2) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','1')\" >" . $prevlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','".($page-1)."')\" >" . $prevlabel . "</a></li>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','1')\" >1</a></li>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class=\"active\"><a>" . $i . "</a></li>\n";
		}
		elseif($i==1) {
			$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','1')\" >" . $i . "</a></li>\n";
		}
		else {
			$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','".$i."')\" >" . $i . "</a></li>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','".$tpages."')\" >" . $tpages . "</a></li>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/year/','".$filter_year."','".($page+1)."')\" >" . $nextlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a>" . $nextlabel . "</a></li>\n";
	}
	
	$out.= "</ul>";
	
	return $out;
}



function paginate_star($reload, $page, $tpages, $adjacents,$filter_star) {
	
	$prevlabel = "<i class=\"fa fa-chevron-left\"></i>";
	$nextlabel = "<i class=\"fa fa-chevron-right\"></i>";
	
	$out = "<ul class=\"pagination pagination\">\n";
	
	// previous
	if($page==1) {
		$out.= "<li><a>" . $prevlabel . "</a></li>\n";
	}
	elseif($page==2) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','1')\" >" . $prevlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','".($page-1)."')\" >" . $prevlabel . "</a></li>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','1')\" >1</a></li>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class=\"active\"><a>" . $i . "</a></li>\n";
		}
		elseif($i==1) {
			$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','1')\" >" . $i . "</a></li>\n";
		}
		else {
			$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','".$i."')\" >" . $i . "</a></li>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','".$tpages."')\" >" . $tpages . "</a></li>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/star/','".$filter_star."','".($page+1)."')\" >" . $nextlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a>" . $nextlabel . "</a></li>\n";
	}
	
	$out.= "</ul>";
	
	return $out;
}

function paginate_alphabet($reload, $page, $tpages, $adjacents,$filter_alpha) {
	
	$prevlabel = "<i class=\"fa fa-chevron-left\"></i>";
	$nextlabel = "<i class=\"fa fa-chevron-right\"></i>";
	
	$out = "<ul class=\"pagination pagination\">\n";
	
	// previous
	if($page==1) {
		$out.= "<li><a>" . $prevlabel . "</a></li>\n";
	}
	elseif($page==2) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','1')\" >" . $prevlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','".($page-1)."')\" >" . $prevlabel . "</a></li>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','1')\" >1</a></li>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class=\"active\"><a>" . $i . "</a></li>\n";
		}
		elseif($i==1) {
			$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','1')\" >" . $i . "</a></li>\n";
		}
		else {
			$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','".$i."')\" >" . $i . "</a></li>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','".$tpages."')\" >" . $tpages . "</a></li>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a onclick=\"pagination_post_method('http://parser-logavdm1.rhcloud.com/movies/a-z/','".$filter_alpha."','".($page+1)."')\" >" . $nextlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a>" . $nextlabel . "</a></li>\n";
	}
	
	$out.= "</ul>";
	
	return $out;
}

function total_movie_count()
{
	$conn = connect_db();
	$sql="SELECT COUNT(*) as total FROM movies_table";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];

}

function total_song_count_by_star($strnme)
{
	$conn = connect_db();
	$sql="SELECT *  FROM movies_table WHERE artist='$strnme'";
	$result = $conn->query($sql);
	$count=0;
	while($row = $result->fetch_assoc())
	{
		$cunt=get_song_count_by_movieid($row['movie_id']);
		$count=$count+$cunt;
	}

return $count;

}

function get_song_count_by_movieid($mveid)
{
	$conn = connect_db();
	$sql="SELECT COUNT(*) as total FROM songs_table WHERE m_id='$mveid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];
}



function total_movies_count($filter)
{

	$conn = connect_db();
	if($filter=="All")
	$sql="SELECT COUNT(*) as total FROM movies_table";
	else
	$sql="SELECT COUNT(*) as total FROM movies_table WHERE release_year='$filter'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	return $row['total'];
}




function total_movies_count_star($star_name)
{

	$conn = connect_db();
	
	$sql="SELECT COUNT(*) as total FROM movies_table WHERE artist='$star_name'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	return $row['total'];
}

function get_yearswise_movies()
{
	$conn = connect_db();
	$sql="SELECT DISTINCT release_year FROM movies_table"; 
	$result = $conn->query($sql);
	$data=array();
	$count=0;
	while($row = $result->fetch_assoc())
	{
		$data[$count]=$row['release_year'];
		$count++;
	}
	rsort($data);

$returnvalue='';
	foreach ($data as $key => $val) {
		if($val!=' ')
		$returnvalue=$returnvalue."<a onclick=\"filter_post_method('','year','".$val."','1')\"class=\"list-group-item\">".$val." Hits<label class=\" label bg-info dk m-l-xs pull-right\">".total_movies_count($val)."</label></a>";

	}
	

	return $returnvalue;  

}



function get_starwise_movies()
{
	$conn = connect_db();
	$sql="SELECT DISTINCT artist FROM movies_table LIMIT 150"; 
	$result = $conn->query($sql);
	$data=array();
	$count=0;
	while($row = $result->fetch_assoc())
	{
		$data[$count]=$row['artist'];
		$count++;
	}
	
	
    
$tarray=array();
$countdown=0;
foreach ($data as $key => $value) {
	$temp=array();
	$temp['name']=$value;
	$temp['cunt']=total_movies_count_star($value);
	$tarray[$countdown]=$temp;
	$countdown++;

}

function cmp($a, $b){
        if ($a == $b)
            return 0;
        return ($a['cunt'] > $b['cunt']) ? -1 : 1;
    }

    usort($tarray, "cmp");



$returnvalue='';
	foreach ($tarray as $key => $val) {
		if($val['name']!='')
		$returnvalue=$returnvalue."<a onclick=\"filter_post_method('','artist','".$val['name']."','1')\"class=\"list-group-item\">".$val['name']."<label class=\" label bg-info dk m-l-xs pull-right\">".$val['cunt']."</label></a>";

	}
	

	return $returnvalue;  

}

function download_file($url,$size,$file_name)
{

$file = $url;
header ("Content-Type: application/octet-stream");
header ("Accept-Ranges: bytes");
header ("Content-Length: ".$size);
header ("Content-Disposition: attachment; filename=".$file_name);
if (readfile($file))
return 1;
else
return 0;
}



function trim_movie_zip_name($zip_name,$str)
{
$variable = substr($zip_name, 0, strpos($zip_name, $str));
if($variable!=' ')
return $variable.$str.'.zip';
else
return $zip_name;

}

function get_file_size($url)
{
 
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 curl_setopt($ch, CURLOPT_HEADER, TRUE);
 curl_setopt($ch, CURLOPT_NOBODY, TRUE);

 $data = curl_exec($ch);
 $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

 curl_close($ch);
 return $size;

}
                        
function format_size($size1) {

        $mod = 1024;

        for ($i = 0; $size1 > $mod; $i++) {
            $size1 /= $mod;
        }

        $endIndex = strpos($size1, ".")+3;

        return substr( $size1, 0, $endIndex);
    }                    





function get_latest_video()
{

$conn = connect_db();
$sql = "SELECT * FROM videos ORDER BY sno ASC LIMIT 3";
$result = $conn->query($sql);
return $result;
}


function paginate_videos($reload, $page, $tpages, $adjacents) {
	
	$prevlabel = "<i class=\"fa fa-chevron-left\"></i>";
	$nextlabel = "<i class=\"fa fa-chevron-right\"></i>";
	
	$out = "<ul class=\"pagination pagination\">\n";
	
	// previous
	if($page==1) {
		$out.= "<li><a>" . $prevlabel . "</a></li>\n";
	}
	elseif($page==2) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','1')\" >" . $prevlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','".($page-1)."')\" >" . $prevlabel . "</a></li>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','1')\" >1</a></li>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class=\"active\"><a>" . $i . "</a></li>\n";
		}
		elseif($i==1) {
			$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','1')\" >" . $i . "</a></li>\n";
		}
		else {
			$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','".$i."')\" >" . $i . "</a></li>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','".$tpages."')\" >" . $tpages . "</a></li>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/videos/','".($page+1)."')\" >" . $nextlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a>" . $nextlabel . "</a></li>\n";
	}
	
	$out.= "</ul>";
	
	return $out;
}


function get_movie_video_source($url)
{
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);
preg_match_all("/\"(.*?)\"/", strip_tags($content, '<br>'), $output_array);
return trim($output_array[0][2], '"');
}



function get_video_by_sno($vsno)
{

	$conn=connect_db();
	$sql = "SELECT * FROM videos WHERE sno='$vsno'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$resource=get_movie_video_source($row['d_page']);
	return $resource;

}

function get_video_name_by_sno($vsno)
{
	$conn=connect_db();
	$sql = "SELECT * FROM videos WHERE sno='$vsno'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['video_name'];

}

function get_video_image_by_sno($vsno)
{
	$conn=connect_db();
	$sql = "SELECT * FROM videos WHERE sno='$vsno'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['v_poster_image'];
}





#waiting list code


/*

<script type="text/javascript">
  
$(document).ready(function(){
setTimeout(function() {

  var value=$('video').attr('src');
      
    setCookie('movie_url', value, 1);

    }, 2000);

});


</script>

<?php

sleep(5);

echo $_COOKIE['movie_url'];

?>





<script type="text/javascript">
  

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}



</script>



*/

?>
