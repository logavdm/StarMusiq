<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>starmusiq</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
  
function postAndRedirect(url, postData,type)
{
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






function fill(value)
{
  $("#moviesearchbox").val(value);

var txtval=$("#moviesearchbox").val();
var matches = txtval.match(/\[(.*?)\]/)[1].match(/\d+/)[0];
if(matches!='')

postAndRedirect('track/',matches,'1');


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
url: "admin/get_movies_name.php",
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
        <a href="http://parser-logavdm1.rhclooud.com/" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">Star Music</span>
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
        <aside class="bg-black dk  aside hidden-print" id="nav">          
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
                        <span class="font-bold active">Home</span>
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
                          <a href="http://parser-logavdm1.rhcloud.com/movies/year/" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Year Collection</span>
                          </a>
                        </li>
                        <li >
                          <a href="http://parser-logavdm1.rhcloud.com/movies/star/" class="auto">                                                        
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
                      <li>
                      <a href="video.html" data-target="#content" data-el="#bjax-el" data-replace="true">
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
            
           
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" ><i class="icon-refresh i-lg  inline" id="refresh"></i></a>
                  <h2 class="font-thin m-b">New Release <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                  <div class="row row-sm">


                  <?php

                        include "admin/connection.php";
                        $sql = "SELECT * FROM movies_table ORDER BY sno DESC LIMIT 12  ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc())
                            {

                          ?>

                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2" >
                      <div class="item" onclick="postAndRedirect('track/',<?php echo $row['movie_id'];?>,'1')">
                        <div class="pos-rlt">
                          
                          <div class="item-overlay opacity r r-2x bg-black">
                            <div class="text-info padder m-t-sm text-sm">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o text-muted"></i>
                            </div>
                            <div class="center text-center m-t-n">
                              <i class=" icon-arrow-down i-2x"></i>
                            </div>
                            <div class="bottom padder m-b-sm">
                              <a href="#" class="pull-right">
                                <i class="fa fa-heart-o"></i>
                              </a>
                              <a href="#">
                                <i class="fa fa-plus-circle"></i>
                              </a>
                            </div>
                          </div>
                          <a href="#"><img src="<?php echo $row['movie_poster_image'];?>" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                          <a href="#" class="text-ellipsis"><?php echo $row['movie_name'] ;?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $row['artist'] ;?></a>
                        </div>
                      </div>
                    </div>


                    <?php
                          }
                        }

                    ?>



                   
                  </div>
                  <!--new movies end here-->

                  <div class="row">
                    <div class="col-md-7">
                      <h3 class="font-thin">Popular Songs</h3>
                      <div class="row row-sm">
                          <?php

                            include "admin/connection.php";
                            include "admin/functions.php";
                            $sql = "SELECT * FROM songs_table ORDER BY RAND() LIMIT 8 ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc())
                                {
                                    ?>


                          <div class="col-xs-6 col-sm-3">
                          <div class="item" onclick="postAndRedirect('track/',<?php echo $row['song_id'];?>,'2')" >
                            <div class="pos-rlt">
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                  <a href="#"><i class="icon-arrow-down i-2x"></i></a>
                                </div>
                              </div>


                              <?php 

                                $mve=$row['m_id'];
                              $query="SELECT movie_poster_image from movies_table WHERE movie_id='$mve'";
                              $result1 = $conn->query($query);
                              $row1=$result1->fetch_assoc();
                              echo "<a href='#''><img src='".$row1['movie_poster_image']."' alt='' class='r r-2x img-full'></a>";

                              ?>



                              
                            </div>
                            <div class="padder-v">
                              <a href="#" class="text-ellipsis"><?php echo trim_song_name($row['song_name']);?></a>
                              <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $row['m_name'];?></a>
                            </div>
                          </div>
                        </div>


                          <?php

                        }
                      }


                          ?>


                                       
                        
                       
                      </div>
                    </div>


                    <div class="col-md-5">
                      <h3 class="font-thin">Top Songs</h3>
                      <div class="list-group bg-white list-group-lg no-bg auto">                          
                        <a href="#" class="list-group-item clearfix">
                          <span class="pull-right h2 text-muted m-l">1</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/a4.png" alt="...">
                          </span>
                          <span class="clear">
                            <span>Little Town</span>
                            <small class="text-muted clear text-ellipsis">by Chris Fox</small>
                          </span>
                        </a>
                        <a href="#" class="list-group-item clearfix">
                          <span class="pull-right h2 text-muted m-l">2</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/a5.png" alt="...">
                          </span>
                          <span class="clear">
                            <span>Lementum ligula vitae</span>
                            <small class="text-muted clear text-ellipsis">by Amanda Conlan</small>
                          </span>
                        </a>
                        <a href="#" class="list-group-item clearfix">
                          <span class="pull-right h2 text-muted m-l">3</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/a6.png" alt="...">
                          </span>
                          <span class="clear">
                            <span>Aliquam sollicitudin venenatis</span>
                            <small class="text-muted clear text-ellipsis">by Dan Doorack</small>
                          </span>
                        </a>
                        <a href="#" class="list-group-item clearfix">
                          <span class="pull-right h2 text-muted m-l">4</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/a7.png" alt="...">
                          </span>
                          <span class="clear">
                            <span>Aliquam sollicitudin venenatis ipsum</span>
                            <small class="text-muted clear text-ellipsis">by Lauren Taylor</small>
                          </span>
                        </a>
                        <a href="#" class="list-group-item clearfix">
                          <span class="pull-right h2 text-muted m-l">5</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/a8.png" alt="...">
                          </span>
                          <span class="clear">
                            <span>Vestibulum ullamcorper</span>
                            <small class="text-muted clear text-ellipsis">by Dan Doorack</small>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                  
                </section>
                <footer class="footer bg-success dker">
              
            </footer>
              </section>
            </section>
            
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>
  
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
  <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>