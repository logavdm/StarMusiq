<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>starmusiq</title>
  <meta name="description" content="tamil songs, new tamil songs, tamil songs download, tamil movies songs, tamil movies songs download,songs,tamil music,tamil music download,tamil movie music " />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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


function postAndRedirectStar(url, postData)
{
    var postFormStr = "<form method='POST' action='" + url + "'>\n";

        
            postFormStr += "<input type='hidden' name='filter' value='" + postData + "'></input>";
            

    postFormStr += "</form>";
    var formElement = $(postFormStr);
    $('body').append(formElement);
    $(formElement).submit();
}


function postAndRedirectYear(url, postData)
{
    var postFormStr = "<form method='POST' action='" + url + "'>\n";

        
            postFormStr += "<input type='hidden' name='filter' value='" + postData + "'></input>";
            

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
      <div class="navbar-header aside bg-danger ">
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
                      <a>
                        <i class="icon-disc icon text-success"></i>
                        <span class="font-bold text-muted">Home</span>
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
                        
                        <span class="font-bold">Songs</span>
                      </a>
                      <ul class="nav dk text-sm">
                       <li >
                          <a href="http://parser-logavdm1.rhcloud.com/movies/a-z/" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>A - Z Hits</span>
                          </a>
                        </li>
                        <li >
                          <a href="http://parser-logavdm1.rhcloud.com/movies/star/" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Star Collection</span>
                          </a>
                        </li>
                        <li >
                          <a href="http://parser-logavdm1.rhcloud.com/movies/year/" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Year Collection</span>
                          </a>
                        </li>
                        
                      
                      </ul>
                    </li>

                    <li>
                      <a href="events.html">
                        
                        <i class="icon-social-youtube icon  text-primary"></i>
                        
                        <span class="font-bold">Online TV</span>
                      </a>
                    </li>
                    <li>
                      <a href="listen.html">
                        <i class="icon-drawer icon text-primary-lter"></i>
                        <span class="font-bold">Online Radio</span>
                      </a>

                      </li>
                    <li>
                      <li>
                      <a href="http://parser-logavdm1.rhcloud.com/videos/" data-target="#content" data-el="#bjax-el" data-replace="true">
                        <i class="icon-social-youtube icon  text-primary"></i>
                        <span class="font-bold">Video</span>
                      </a>
                    </li>
                    </li>
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>               
                                
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
           <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <div class="bg hidden-xs ">
                  <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs"> 
                      
                      <img src="../images/logo-icon.jpg" alt="." class="dker">                       
                        
                        
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt">StarMusiq</strong> 
                          
                        </span>
                        <span class="text-muted text-xs block m-l">Download Music Online</span>
                      </span>
                    </a>
                   
                  </div>
                </div>            </footer>
            
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

                       include "../admin/functions.php";
                       

                    ?>


                      <div class="col-sm-5">
                      <?php   

                        if (isset($_POST['movie_id'])) {
                            $poster=get_movie_poster_image($_POST['movie_id']);
                              if($poster!="error")
                               echo "<img src=\"../../".$poster."\" class=\"img-full m-b\">";
                             else
                              echo "<img src=\"../../images/music_placeholder.png\" class=\"img-full m-b\">";
                        }
                        else if(isset($_POST['song_id']))
                        {

                            $mveid=get_movieid_by_songid($_POST['song_id']);
                            if($mveid!="error")
                            {
                                $poster=get_movie_poster_image($mveid);
                                if($poster!="error")
                                echo "<img src=\"../../".$poster."\" class=\"img-full m-b\">";
                                else
                                echo "<img src=\"../../images/music_placeholder.png\" class=\"img-full m-b\">";


                            }
                            else
                            {

                              echo "<img src=\"../../images/music_placeholder.png\" class=\"img-full m-b\">";
                            }


                        }

                      ?>
                        
                      </div>



                        <div class="col-sm-7">
                        <h2 class="m-t-none text-black">

                        <?php   

                          if(isset($_POST['movie_id']))
                          {

                              echo trim_song_name(get_movie_name_by_movieid($_POST['movie_id']));
                          }
                          else if(isset($_POST['song_id']))
                          {
                              echo trim_song_name(get_song_name_by_songid($_POST['song_id']));
                          }

                        ?>
                        </h2>

                        <div class="clearfix m-b-lg">
                          <a href="#" class="thumb-sm pull-left m-r">
                            <img src="../images/a8.png" class="img-circle">
                          </a>
                          <div class="clear">
                            


                            <?php  

                              if (isset($_POST['movie_id'])) {

                                $artist_name=get_artist_by_movieid($_POST['movie_id']);
                                if($artist_name!="error")

                                      {
                                        echo "<a  class=\"text-info\" onclick=\"postAndRedirectStar('../movies/star/','".$artist_name."')\">".$artist_name."</a>";
                                        echo "<small class=\"block text-muted\">Total Movies  ".get_star_movie_count_by_starname($artist_name)." /  Total Songs ".total_song_count_by_star($artist_name)."</small>";

                                       }
                                else echo "Artist Not Found</a>";
                              }
                              else if(isset($_POST['song_id']))
                              {
                                $mveid=get_movieid_by_songid($_POST['song_id']);
                                if($mveid!="error"){
                                        
                                        $artist_name=get_artist_by_movieid($mveid);
                                        if($artist_name!="error"){
                                        echo  "<a  class=\"text-info\" onclick=\"postAndRedirectStar('../movies/star/','".$artist_name."')\">".$artist_name."</a>";
                                        echo "<a><small class=\"block text-muted\">Total Movies : ".get_star_movie_count_by_starname($artist_name)."/  Total Songs ".total_song_count_by_star($artist_name)."</small></a>";

                                      }
                                  }
                               else
                                echo "Artist Not Found</a>";

                              }

                            ?>

                           
                            
                          </div>
                        </div>
                        <div class="m-b-lg">
                          <?php 

                            if (isset($_POST['movie_id'])) {

                              $url_320=get_320kbps_download_by_movieid($_POST['movie_id']);
                              if ($url_320!="error") {
                               

                               echo "<a href=\"#\" class=\"btn btn-info\">Download All Songs (320 Kbps)</a> <br><br>"; 
                                }

                                $url_160=get_160kbps_download_by_movieid($_POST['movie_id']);
                                if($url_160!="error")
                                {
                                  echo "<a href=\"#\" class=\"btn btn-default\">Download All Songs (160 Kbps)</a>";
                                }

                            }

                            else if(isset($_POST['song_id']))
                            {

                                echo "<a href=\"#\" class=\"btn btn-info\">Download Song</a> <br><br>"; 


                            }

                          

                          ?>
                        </div>
                        <div>
                          Tags: 

                          <?php

#---------------------------tag year -------------------------------------------------------

                          if (isset($_POST['movie_id'])) {
                            
                            $tag1=get_movie_release_year_by_movieid($_POST['movie_id']);
                            if ($tag1!="error") {
                              
                              echo "<a class=\"badge bg-light\" onclick=\"postAndRedirectYear('../movies/year/','".$tag1."')\">".$tag1." Hits</a>";
                            }
                            else
                              echo "Not Found";

                          }
                          else if($_POST['song_id'])
                          {
                            
                            $tag1=get_movie_release_year_by_songid($_POST['song_id']);
                              if ($tag1!="error") {
                              
                              echo "<a class=\"badge bg-light\" onclick=\"postAndRedirectStar('../movies/year/','".$tag1."')\">".$tag1." Hits</a>";
                            }
                            else
                              echo "<a class=\"badge bg-light\">Not Found Hits</a>";

                          }


#---------------------------tag artist--------------------------------------------------------

                          if (isset($_POST['movie_id'])) {

                            $artist_name=get_artist_by_movieid($_POST['movie_id']);
                            if ($artist_name!="error") {
                              echo "<a class=\"badge bg-light\" onclick=\"postAndRedirectStar('../movies/star/','".$artist_name."')\">".$artist_name."</a>";
                            }
                            else
                             echo "<a class=\"badge bg-light\">Not Found Hits</a>";
                            
                          }
                          else if (isset($_POST['song_id'])) {
                              $mveid=get_movieid_by_songid($_POST['song_id']);
                              $artist_name=get_artist_by_movieid($mveid);
                            if ($artist_name!="error") {
                              echo "<a class=\"badge bg-light\" onclick=\"postAndRedirectStar('../movies/star/','".$artist_name."')\">".$artist_name."</a>";
                            }
                            else
                             echo "<a class=\"badge bg-light\">Not Found Hits</a>";


                          }




                          ?>

                     
                        </div>
                      </div>
                    </div>
                   <div class="m-t">

                    <p>

                      <?php  

                        if (isset($_POST['movie_id'])) {
                          $desc=get_movie_description_by_movie_id($_POST['movie_id']);
                            if ($desc!="error") {
                              $myArray = explode(',', $desc);
                              foreach($myArray as $my_Array){
                                echo $my_Array.'<br>'; 
                              }
                              
                            }
                            else
                              echo "movie description not found";
                        
                        }
                        else if (isset($_POST['song_id'])) {
                          
                          $desc=get_movie_description_by_song_id($_POST['song_id']);
                            if ($desc!="error") {
                              $myArray = explode(',', $desc);
                              foreach($myArray as $my_Array){
                                echo $my_Array.'<br>'; 
                              }
                            }
                            else
                              echo "movie description not found";

                        }


                      ?>
                      
                       </p>
                      
                    </div>
                    <h4 class="m-t-lg m-b">Play List (  

                      <?php 

                      if(isset($_POST['movie_id'])){
                        $mvenme=get_movie_name_by_movieid($_POST['movie_id']);
                      

                     echo "<a style=\"color:#5bc0de;\" onMouseOver=\"this.style.color='green'\" onMouseOut=\"this.style.color='#5bc0de'\">".$mvenme."</a>  )  ";
                      

                      }else if(isset($_POST['song_id'])){
                        
                        $mvename=get_movie_name_by_song_id($_POST['song_id']);
                        $mveid=get_movieid_by_songid($_POST['song_id']);
                          if ($mvename!="error") {
                            echo "<a style=\"color:#5bc0de;font-weight:bold;\" onMouseOver=\"this.style.color='green'\" onMouseOut=\"this.style.color='#5bc0de'\" onclick=\"postAndRedirect('../track/','".$mveid."','1','0')\">".$mvename."</a>   )";
                          }
                        

                        }

                        ?> </h4>
                    <ul class="list-group list-group-lg">

                                       
                    <?php

                      if (isset($_POST['movie_id'])) {

                        $result=get_song_list_by_movie_id($_POST['movie_id']);
                       
                      }
                      else if (isset($_POST['song_id'])) {

                        $result=get_song_list_by_song_id($_POST['song_id']);
                        
                      }
                      
                      if ($result=="error") {
                        echo "Songs List Is Empty";
                      }
                      else
                        while($row = $result->fetch_assoc())
                        {

                    ?>

                        <li class="list-group-item">
                        <div class="pull-right m-l">
                          <a href="<?php echo "http://www.starmusiq.com/download/?songID=".$row['song_id'];?>" class="m-r-sm"><i class=" icon-arrow-down i-1x"></i></a>
                        </div>
                        <a href="#" class="jp-play-me m-r-sm pull-left">
                          <i class="icon-control-play icon text-info"></i>
                          <i class="icon-control-pause text-active"></i>
                        </a>
                        <div class="clear text-ellipsis">
                          <span><?php echo trim_song_name($row['song_name']);?></span>
                          
                        </div>
                      </li>

                      <?php

                        }

                      ?>

                      
                    </ul>
                    
                   
                    
                
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">Suggestions</div>
                    <div class="panel-body">
                      <?php  
                    

                    $result=get_suggestion_list_movie();

                    if($result=="error")
                      {
                        echo "Latest Movies List Is Empty";
                      }
                    else
                      while($row = $result->fetch_assoc())
                      {
                     ?>
                      <article class="media" onclick="postAndRedirect('',<?php echo $row['movie_id'];?>,'1')">
                        <a href="#" class="pull-left thumb-md m-t-xs">
                          <img src="../<?php echo get_movie_poster_image($row['movie_id']);?>">
                        </a>
                        <div class="media-body">                        
                          <a href="#" class="font-semibold"><?php echo $row['movie_name']; ?></a>
                          <div class="text-xs block m-t-xs"><a href="#"><?php echo $row['artist']; ?></a> </div>
                        </div>
                      </article>

                      <?php 
                        }
                       ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <footer class="footer bg-success">
                  <div id="jp_container_N">
                    <div class="jp-type-playlist">
                      <div id="jplayer_N" class="jp-jplayer hide"></div>
                      <div class="jp-gui">
                        <div class="jp-video-play hide">
                          <a class="jp-video-play-icon">play</a>
                        </div>
                        <div class="jp-interface">
                          <div class="jp-controls">
                            <div><a class="jp-previous"><i class="icon-control-rewind i-lg"></i></a></div>
                            <div>
                              <a class="jp-play"><i class="icon-control-play i-2x"></i></a>
                              <a class="jp-pause hid"><i class="icon-control-pause i-2x"></i></a>
                            </div>
                            <div><a class="jp-next"><i class="icon-control-forward i-lg"></i></a></div>
                            <div class="hide"><a class="jp-stop"><i class="fa fa-stop"></i></a></div>
                            <div><a class="" data-toggle="dropdown" data-target="#playlist"><i class="icon-list"></i></a></div>
                            <div class="jp-progress hidden-xs">
                              <div class="jp-seek-bar dk">
                                <div class="jp-play-bar bg-success">
                                </div>
                                <div class="jp-title text-lt">
                                  <ul>
                                    <li></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="hidden-xs hidden-sm jp-current-time text-xs text-muted"></div>
                            <div class="hidden-xs hidden-sm jp-duration text-xs text-muted"></div>
                            <div class="hidden-xs hidden-sm">
                              <a class="jp-mute" title="mute"><i class="icon-volume-2"></i></a>
                              <a class="jp-unmute hid" title="unmute"><i class="icon-volume-off"></i></a>
                            </div>
                            <div class="hidden-xs hidden-sm jp-volume">
                              <div class="jp-volume-bar dk">
                                <div class="jp-volume-bar-value lter"></div>
                              </div>
                            </div>
                            <div>
                              <a class="jp-shuffle" title="shuffle"><i class="icon-shuffle text-muted"></i></a>
                              <a class="jp-shuffle-off hid" title="shuffle off"><i class="icon-shuffle text-lt"></i></a>
                            </div>
                            <div>
                              <a class="jp-repeat" title="repeat"><i class="icon-loop text-muted"></i></a>
                              <a class="jp-repeat-off hid" title="repeat off"><i class="icon-loop text-lt"></i></a>
                            </div>
                            <div class="hide">
                              <a class="jp-full-screen" title="full screen"><i class="fa fa-expand"></i></a>
                              <a class="jp-restore-screen" title="restore screen"><i class="fa fa-compress text-lt"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="jp-playlist dropup" id="playlist">
                        <ul class="dropdown-menu aside-xl dker">
                          <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                          <li class="list-group-item"></li>
                        </ul>
                      </div>
                      <div class="jp-no-solution hide">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                      </div>
                    </div>
                  </div>
                </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>
 
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/app.plugin.js"></script>
  <script type="text/javascript" src="../js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="../js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="../js/jPlayer/demo.js"></script>
</body>
</html>