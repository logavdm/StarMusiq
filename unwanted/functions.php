<?php

  



function trim_song_name($song_name)
{
	if(strstr($song_name,'-',true)!='')
	return strstr($song_name,'-',true);
	else
	return $song_name;

}



function get_suggestion_list(){
$conn = new mysqli('localhost', 'root', '', 'music');
$sql="SELECT * FROM movies_table ORDER BY RAND() LIMIT 10";
$result = $conn->query($sql);
$str='';
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc())
{
			$fun="postAndRedirect('../track/',".$row['movie_id'].",'1')";
			$str=$str."<article class='media' onclick=".$fun."><a href='#'' class='pull-left thumb-md m-t-xs'><img src='".$row['movie_poster_image']."'></a><div class='media-body'><a href='#' class='font-semibold'>".$row['movie_name']."</a><div class='text-xs block m-t-xs'><a href='#''>".$row['artist']."</a>
			</div></div></article>";

                      
	}
}

return $str;
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
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','1')\" >" . $prevlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','".($page-1)."')\" >" . $prevlabel . "</a></li>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','1')\" >1</a></li>\n";
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
			$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','1')\" >" . $i . "</a></li>\n";
		}
		else {
			$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','".$i."')\" >" . $i . "</a></li>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','".$tpages."')\" >" . $tpages . "</a></li>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/year/','".$filter_year."','".($page+1)."')\" >" . $nextlabel . "</a></li>\n";
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
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','1')\" >" . $prevlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','".($page-1)."')\" >" . $prevlabel . "</a></li>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','1')\" >1</a></li>\n";
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
			$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','1')\" >" . $i . "</a></li>\n";
		}
		else {
			$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','".$i."')\" >" . $i . "</a></li>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','".$tpages."')\" >" . $tpages . "</a></li>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a onclick=\"pagination_post_method('http://localhost/music application/movies/star/','".$filter_star."','".($page+1)."')\" >" . $nextlabel . "</a></li>\n";
	}
	else {
		$out.= "<li><a>" . $nextlabel . "</a></li>\n";
	}
	
	$out.= "</ul>";
	
	return $out;
}








function total_movies_count($filter)
{

	$conn = new mysqli('localhost', 'root', '', 'music');
	if($filter=="All")
	$sql="SELECT COUNT(*) as total FROM movies_table";
	else
	$sql="SELECT COUNT(*) as total FROM movies_table WHERE release_year='$filter'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	return $row['total'];
}


function total_movies_count_star($filter)
{

	$conn = new mysqli('localhost', 'root', '', 'music');
	
	$sql="SELECT COUNT(*) as total FROM movies_table WHERE artist='$filter'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	return $row['total'];
}

function get_yearswise_movies()
{
	$conn = new mysqli('localhost', 'root', '', 'music');
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
	$conn = new mysqli('localhost', 'root', '', 'music');
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


?>
