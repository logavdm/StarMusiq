
<html>
	<head>
		<title> Get Music URL</title>

		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	<body>





<div class="col-md-6 col-md-offset-3" style="margin-top:10%;" ><div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337ab7;color:#fff;font-weight: 700;font-size:17px;">Get music details</div>
    <div class="panel-body">


<form method="GET" action="result.php">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Enter Start Musiq Movie URL :</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="starmusic" placeholder="Enter URL">
  </fieldset>
  <fieldset class="form-group">
    <label for="formGroupExampleInput2">Enter Stream URL Of The Movie</label>
    <input type="text" class="form-control" name="streamurl" id="formGroupExampleInput2" placeholder="Enter URL">
  </fieldset>
   <fieldset class="form-group">
    <label for="formGroupExampleInput2">Enter Movie Poster URL</label>
    <input type="text" class="form-control" name="imgurl" id="formGroupExampleInput3" placeholder="Enter URL">
  </fieldset>
  <input class="btn btn-primary" type="submit" value="Get Details">
</form>

    </div>
  </div></div>




	</body>
	</html>

