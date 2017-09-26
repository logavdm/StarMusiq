<html>
<head>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style type="text/css">


  .table {
    border-bottom:0px !important;
}
.table th, .table td {
    border: 0px !important;
}


</style>

</head>

<body>



<?php


include('simple_html_dom.php');

	$surl=$_GET["starmusic"];
	$sturl=$_GET["streamurl"];
  $imgurl=$_GET["imgurl"];
	


$html = file_get_html($surl);

// Find all article blocks
$count=0;

        
 foreach($html->find('table.main_tb2 td h1') as $article) {
	
if($count==2)
    $moviename=$article;
    $count++;
}


$count=0;




	?>




<div class="container-fluid">
  <div class="row">
<div class="col-md-12">
<div class="panel panel-default">

<div class="panel-heading" style="background-color:#337ab7;color:#fff;font-weight: 700;font-size:17px;"><?php echo $moviename; ?></div>
 <div class="panel-body">


<div class="row">
    <div class="col-md-4">
        <?php
            foreach($html->find('table.main_tb2 tr p') as $article) {
            if($count<8)
            echo $article;
            $count++;
            }
            ?>
          </div>


 <div class="col-md-8">
            
            <h1>Full Songs Zip Download URL :</h1>
              <?php
              $count=0;
              foreach($html->find('td[width=320] a') as $article) {
                if($count<8)
                echo $article->href;
                $count++;
                }

            ?>
            <br><br><h1>Image URL:</h1>
            <?php echo $imgurl; ?>
        </div>
</div>

<div class="row">

<div class="col-md-12">

<div class="panel panel-default">

<div class="panel-heading" style="background-color:#337ab7;color:#fff;font-weight: 700;font-size:17px;">Song Download URL</div>
 <div class="panel-body">


<table class="table" style="border: none;">
   
    <tbody>
   
        <?php
              $count=0;
              $i=0;
                foreach($html->find('table.main_tb2 tr h2') as $article) {
                echo "<tr>";
                if($count>4)
                {
                echo "<td>".$article->innertext."</td>";
                $i++;
                $j=0;
                foreach($html->find('table.main_tb2 tr a') as $article) {
               if($article->innertext=="Download")
                {$j++;}
                if($i==$j){
                echo "<td>http://www.starmusiq.com/".$article ->href."</td>";break;}
            }
                }
                $count++;
                echo "</tr>";
               
                }

            ?>
</tr>
           
 </tbody>
  </table>



 </div></div>




</div>

<div class="col-md-12">
<div class="panel panel-default">

<div class="panel-heading" style="background-color:#337ab7;color:#fff;font-weight: 700;font-size:17px;">Stream Web Site URL</div>
 <div class="panel-body">

<table class="table">
    <thead>
      <tr>
        <th>Song Name</th>
        <th>Download URL</th>
       </tr>
    </thead>
    <tbody>
    
        

      <?php

      $html2 = file_get_html($sturl);
              $count=0;
              $i=0;
                foreach($html2->find('span.songlist') as $article) {
                echo "<tr>";
                echo "<td>".$article->plaintext."</td>";
                $i++;
                $j=0;
                foreach($html2->find('span.download a') as $article) {
                $j++;
                if($i==$j){
                echo "<td>".$article ->href."</td>";break;}
            }
                
                $count++;
                echo "</tr>";
               
                }

            ?>
</tr>
           
 </tbody>
  </table>





</div></div>


</div></div>




 </div></div></div></div></div>



<!--Movie Details-->

    

       
     




    
  
</div>


<h1></h1>






<div class="container-fluid">
    
  </div>














</body>

</html>