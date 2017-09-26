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

	$murl="http://www.starmusiq.com/Latest.asp";
	$extensions="?Movie=&RecNextPg=";
  $total_pages="18";
  $count=1;
  $movies_count=0;

  while ($total_pages!=$count)
  {


       if($count==1)
          {
            $html = file_get_html($murl);
            foreach($html->find('table td h1') as $article) {
            echo $article->innertext."<br>";
            $movies_count++;
                }

                $count++;
          }
        else
        {
            $ex_url=$murl.$extensions.$count;
            $html = file_get_html($ex_url);
            foreach($html->find('table td h1') as $article) {
            echo $article->innertext."<br>";
            $movies_count++;
                }

            $count++;
        }


}




?>


<?php

echo $movies_count;


?>






</body>

</html>