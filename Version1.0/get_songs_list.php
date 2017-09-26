<?php
include "connection.php";

function song_url_builder($song_id_fun)
{
$songs_download_base_url="http://www.starmusiq.com/download/?songID=";
$songs_download_merged_full_url=$songs_download_base_url.$song_id_fun;
return $songs_download_merged_full_url;
}




$mov=$_POST['movie_name_send'];
 
preg_match("/^(.*\[)(.*)(\])/", $mov, $find);
$movie_id = filter_var(trim($find[2]), FILTER_SANITIZE_NUMBER_INT); 

$sql = "SELECT * FROM songs_table WHERE m_id='$movie_id'";
$result = $conn->query($sql);



echo "<table class='table table-striped' style='border-top:none;'></thead>
  <tr>
        <th>Sno</th>
        <th>Song Name</th>
        <th style='text-align:center;'>Download Link</th>
      </tr>
    </thead>
    <tbody>";
if ($result->num_rows > 0) {
  $count=1;
while($row = $result->fetch_assoc())
{

?>

<tr <?php if($count%2==0) echo "class='info'"; ?>><td><?php echo $count;?></td><td><?php echo str_replace("- VmusiQ.Com","",$row['song_name']);;?></td><td style="text-align:center;"><a href="<?php echo song_url_builder(trim($row['song_id']));?>">Downlod Now</a></td></tr>

<?php
$count++;

}
echo "</tbody></table>";
}
else
{
  echo "zero result found";
}



  ?>