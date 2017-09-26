<html>

<head><title>starMusiq</title></head>
<body>
<?php

include "../admin/functions.php";

if(isset($_POST['song_id'])){

echo "Please Wait For Download Song Will Download And This page automatically close";

$url ='http://www.starmusiq.com/download/?songID='.$_POST['song_id'] ;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);


preg_match_all('/<a[^>]+href=([\'"])(.+?)\1[^>]*>/i', $data, $result);

if (!empty($result[2][0])) {
    # Found a link.

    $my_new_string = trim_song_name(basename($result[2][0]));

 
 $size = get_file_size($result[2][0]);

if(download_file($result[2][0],$size,$my_new_string.".mp3")==1)
{
    echo "song download success";
    exit(0);
}
else
{
    echo "song download failed";
    
}



}
}
else if(isset($_POST['movie_id']))
{
echo "Please Wait For Download movie song. <br> movie song Download Automatically And This page automatically close";

include "../admin/connection.php";
$mve=$_POST['movie_id'];

$query="SELECT * from movies_table WHERE movie_id='$mve'";

$result1 = $conn->query($query);
$row1=$result1->fetch_assoc();
if (isset($_POST['kbps'])) {
    
    

    if ($_POST['kbps']=='320')
    {

        $file_name=trim_movie_zip_name(basename($row1['url_320']),'_320kbps');
        $size = get_file_size($row1['url_320']);
        if (download_file($row1['url_320'],$size,$file_name)==1) {
           echo "<br>Movie File Download Success";
           
        }
        else
        echo "<br>Movie File Download Failed";
        
    }
    else
    {
        $file_name=trim_movie_zip_name(basename($row1['url_160']),'_160kbps');
        $size = get_file_size($row1['url_160']);
        if (download_file($row1['url_160'],$size,$file_name)==1) {
           echo "<br>Movie File Download Success";
          
        }
        else
        echo "<br>Movie File Download Failed";
         
    }



}



}

else
{
    echo "Invalid Parameter";
   
}




?>

</body>

</html>