<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>starMusiq</title>
  <link rel="stylesheet" href="../js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
   <script src="../js/jquery.min.js"></script>
  
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->

  <script type="text/javascript">
  
function postAndRedirect(url, postData,type,target)
{

  if (target==1) {
    var postFormStr = "<form method='POST' target='_blank' action='" + url + "'>\n";
}
else
var postFormStr = "<form method='POST' action='" + url + "'>\n";


        if(type==1){
            postFormStr += "<input type='hidden' name='movie_id' value='" + postData + "'></input>";}
            else
            {
              postFormStr += "<input type='hidden' name='song_id' value='" + postData + "'></input>";
            }
       

    postFormStr += "</form>";

    var formElement = $(postFormStr);

    $('body').append(formElement);
    $(formElement).submit();
}

function postAndRedirect_zip(url, postData,kbps)
{


    var postFormStr = "<form method='POST' target='_blank' action='" + url + "'>\n";

            postFormStr += "<input type='hidden' name='movie_id' value='" + postData + "'></input>";
            postFormStr += "<input type='hidden' name='kbps' value='" + kbps + "'></input>";
            
       

    postFormStr += "</form>";

    var formElement = $(postFormStr);

    $('body').append(formElement);
    $(formElement).submit();
}



function fill(value)
{
  $("#moviesearchbox").val(value);

var txtval=$("#moviesearchbox").val();
var matches = txtval.match(/\[(.*?)\]/)[1].match(/\d+/)[0];
if(matches!='')

postAndRedirect('../track/',matches,'1','0');


  $('#display').hide();

}


$(document).ready(function(){
$("#moviesearchbox").keyup(function() {


var regg = $('#moviesearchbox').val();
if(regg=="")
{
$("#display").html("");
}
else
{

$.ajax({
type: "POST",
url: "../admin/get_movies_name.php",
data: "regg="+ regg ,
success: function(html){
$("#display").html(html).show();

}
});
}



});


});





</script>


<style type="text/css">
  

  .suggest-name {
                font-weight: bold;
                display: block;
                height: 15px;
                
            }
            .suggest-description {
                font-style: italic;
                font-size: 11px;
                color: #999;
                
            }


            #display li:hover
            {
                background: rgba(0,120,0, .2);
            }
            #display img
            {
              padding-left: 10px;
              padding-top: 5px;
              padding-bottom: 5px;
            }
</style>




</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info ">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="http://parser-logavdm1.rhcloud.com/" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="../images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">starmusiq</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>


       <div class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group ">
          <div class="input-group">

            <span class="input-group-btn">
              <button type="button" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" id="moviesearchbox" class="form-control input-sm no-border rounded" placeholder="Search songs, albums..." >
            
          </div>
          
        </div>
<div id="display" style="position: absolute;background-color:white;min-width: 350px;"></div>
      </div>
           
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black  aside hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
              
                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav bg clearfix" data-ride="collapse">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      Discover
                    </li>
                    <li>
                      <a href="http://parser-logavdm1.rhcloud.com/">
                        <i class="icon-disc icon text-success"></i>
                        <span class="font-bold">Home</span>
                      </a>
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                        <i class="icon-music-tone-alt icon text-info">
                        </i>
                        <b class="badge bg-info  pull-right">2</b>
                        <span class="font-bold">Movies</span>
                      </a>
                      <ul class="nav dk text-sm">
                        <li >
                          <a href="http://parser-logavdm1.rhcloud.com//movies/year/" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Year Collection</span>
                          </a>
                        </li>
                        <li >
                          <a href="http://parser-logavdm1.rhcloud.com//movies/star/" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Star Collection</span>
                          </a>
                        </li>
                      
                      </ul>
                    </li>
                    <li>
                      <a href="events.html">
                        <i class="icon-drawer icon text-primary-lter"></i>
                        
                        <span class="font-bold">Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="listen.html">
                        <i class="icon-list icon  text-info-dker"></i>
                        <span class="font-bold">Listen</span>
                      </a>
                    </li>
                    <li>
                      <a href="video.html" data-target="#content" data-el="#bjax-el" data-replace="true">
                        <i class="icon-social-youtube icon  text-primary"></i>
                        <span class="font-bold">Video</span>
                      </a>
                    </li>
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                
                 
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox" id="bjax-el">
            <section class="scrollable wrapper-lg">
              <div class="row">
                <div class="col-sm-8">
                  <div class="panel wrapper-lg">
                    <div class="row">

<?php         
                         include "../admin/connection.php";
                         include "../admin/functions.php";

                        if(isset($_POST['movie_id'])) 
                        {
                          $movie=$_POST['movie_id'];
                          $sql = "SELECT * FROM movies_table WHERE movie_id='$movie' ";
                        }
                        else if(isset($_POST['song_id']))
                        {
                          $songs=$_POST['song_id'];
                          $sql = "SELECT * FROM songs_table WHERE song_id='$songs' ";
                        }

                       
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc()
                        ?>
                        


                      <div class="col-sm-5">
                        <?php 


                        if(isset($_POST['movie_id'])) 
                          echo "<img src='".$row['movie_poster_image']."' class='img-full m-b'>";
                            else {
                              $mve=$row['m_id'];
                              $query="SELECT * from movies_table WHERE movie_id='$mve'";
                              $result1 = $conn->query($query);
                              $row1=$result1->fetch_assoc();
                              echo "<img src='".$row1['movie_poster_image']."' class='img-full m-b'>";
                            }

                        

                          


                        ?>
                      </div>
                        <div class="col-sm-7">
                        <h2 class="m-t-none text-black"><?php if(isset($_POST['movie_id'])){echo $row['movie_name'];}else {echo trim_song_name($row['song_name']);}?></h2>
                        <div class="clearfix m-b-lg">
                          <a href="#" class="thumb-sm pull-left m-r">
                            <img src="../images/a0.png" class="img-circle">
                          </a>
                          <div class="clear">
                            <a  class="text-info">


                            <?php 

                            if(isset($_POST['movie_id'])) echo $row['artist'];
                            else {
                              $mve=$row['m_id'];
                              $query="SELECT * from movies_table WHERE movie_id='$mve'";
                              $result1 = $conn->query($query);
                              $row1=$result1->fetch_assoc();
                              echo $row1['artist'];
                            }


                            ?>

                            </a>
                            
                          </div>
                        </div>
                        <div class="m-b-lg">
                          <?php 


                          if (isset($_POST['movie_id'])) {
                            if($row['url_320']!='')
                            echo "<a onclick=\"postAndRedirect_zip('../download/','".$row['movie_id']."','320')\" class='btn btn-info'>Download All Songs as Zip ( 320kbps )</a>" ;
                          if($row['url_160']!='')
                            echo "<br><br><a onclick=\"postAndRedirect_zip('../download/','".$row['movie_id']."','160')\" class='btn btn-info'>Download All Songs as Zip ( 160kbps )</a>" ;
                          } 
                          else
                          {

                            echo "<br><br><a class='btn btn-info'>Download Song</a>" ;
                          
                          }

                          ?>
                        </div>
                        
                      </div>
                    </div>
                   
                    <h4 class="m-t-lg m-b">Play List (  <?php if(isset($_POST['song_id'])){

                      $query1="SELECT * FROM songs_table WHERE song_id=$songs";
                      $result2 = $conn->query($query1);
                      $row2= $result2->fetch_assoc();


                     echo "<a style=\"color:blue;\" onMouseOver=\"this.style.color='green'\" onMouseOut=\"this.style.color='blue'\" onclick=\"postAndRedirect('../track/','".$row2['m_id']."','1','0')\">";
                      echo $row2['m_name'];

                      }else{
                        
                        echo "<a>";echo $row['movie_name'];

                        }?> )</a></h4>
                    <ul class="list-group list-group-lg">

          
                        <?php 
                            if(isset($_POST['movie_id'])){
                            $sql="SELECT * FROM songs_table WHERE m_id=$movie";
                            $result = $conn->query($sql);
                            $count=1;
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc())
                                {

                                  ?>


                        <li class="list-group-item">
                        <div class="pull-right m-l">
                          <a onclick="postAndRedirect('../download/',<?php echo $row['song_id'];?>,'2','1')" class="m-r-sm"><i class=" icon-arrow-down"></i></a>
                        
                          
                        </div>
                        <a href="#" class="jp-play-me m-r-sm pull-left">
                          <i class="icon-music-tone-alt"></i>
                          <i class="icon-music-tone-alt text-active"></i>
                        </a>
                        <div class="clear text-ellipsis">
                          <span><?php echo $count." . ".trim_song_name($row['song_name']);?></span>
                          
                        </div>
                      </li>


                                  <?php
                                  $count++;
                                }}

                              }

                              else
                              {

                              $mve=$row['m_id'];
                              $query="SELECT * from songs_table WHERE m_id='$mve'";
                              $result1 = $conn->query($query);
                              while($row1=$result1->fetch_assoc()){?>


                              <li class="list-group-item">
                        <div class="pull-right m-l">
                          <a href="#" class="m-r-sm"><i class=" icon-arrow-down"></i></a>
                        
                          
                        </div>
                        <a href="#" class="jp-play-me m-r-sm pull-left">
                          <i class="icon-music-tone-alt"></i>
                          <i class="icon-music-tone-alt text-active"></i>
                        </a>
                        <div class="clear text-ellipsis">
                          <span><?php echo trim_song_name($row1['song_name']);?></span>
                          
                        </div>
                      </li>



                              <?php
                              

                              }}


                          ?>
                        
                          

                          

                        
                    


                          



                          
                      
                      

                      
                      
                      
                    </ul>
                    
                   
                    
                
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">Suggestions</div>
                    <div class="panel-body">
                      <?php  




                      echo get_suggestion_list();


                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>
 
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
  
  <script src="../js/app.plugin.js"></script>
  <script type="../text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="../text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="../text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>