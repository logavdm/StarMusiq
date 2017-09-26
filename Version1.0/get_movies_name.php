<?php
include "connection.php";
if(isset($_POST['regg']))
{
$regg=trim($_POST['regg']);

$sql = "SELECT * FROM movies_table WHERE movie_name LIKE '$regg%' limit 10";
$result = $conn->query($sql);

echo "<ul style='list-style: none;
     padding-left: 0px;
   line-height: 2;
   cursor:pointer;'>";
  
while($row = $result->fetch_assoc())
{
?>

<li onclick='fill("<?php echo trim($row['movie_name']) .' [  Movie ID :'.$row['movie_id'].' ]'; ?>")'>

<?php 
echo "<div align='left'><img src='".$row['movie_poster_image']."' style='width:50px; height:50px; float:left;'/></div><span class='suggest-name ' style='padding-left:65px;'>".$row['movie_name']."</span><span class='suggest-description'>".$row['movie_id']."</span><div style='clear:both;'></div>"; 

?></li>
<?php

}
}
?>
</ul> 
