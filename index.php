<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>starmusiq</title>
  <meta name="description" content="tamil songs, new tamil songs, tamil songs download, tamil movies songs, tamil movies songs download,songs,tamil music,tamil music download,tamil movie music " />

  <?php
  echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\" />"

  ?>


  <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" /> 
  <script src="js/jquery.min.js"></script> 
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->

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

function postAndRedirectStar(url, postData)
{
    var postFormStr = "<form method='POST' action='" + url + "'>\n";

        
            postFormStr += "<input type='hidden' name='filter' value='" + postData + "'></input>";
            

    postFormStr += "</form>";
    var formElement = $(postFormStr);
    $('body').append(formElement);
    $(formElement).submit();
}




function fill(value)
{
$("#moviesearchbox").val(value.substring(0,value.indexOf("[")));
var matches = value.match(/\[(.*?)\]/)[1].match(/\d+/)[0];
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


 $(document).ready(function(){


   $('meta[name="viewport"]').prop('content', 'width=device-width, initial-scale=1, maximum-scale=1');
});

</script>



<style type="text/css">

  .suggest-name 
   {
     font-weight: bold;
     display: block;
     height: 15px;
                
   }
  .suggest-description 
  {
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
          <img src="images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">Star Musiq</span>
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
                      <a href="http://parser-logavdm1.rhcloud.com/Tv/">
                        
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
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" ><i class="icon-refresh i-lg  inline" id="refresh"></i></a>
                  <h2 class="font-thin m-b">New Movies <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                  <div class="row row-sm">


                  <?php

                        include "admin/functions.php";
                        $result=get_latest_movies_list();
                        $flag=0;
                        if($result=="error")
                            {
                              echo "Latest Movies List Is Empty";
                            }
                            else
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
                          <a href="#"><img src="<?php echo $row['movie_tumb_image'];?>" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                          <a href="#" class="text-ellipsis"><?php echo $row['movie_name'] ;?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $row['artist'] ;?></a>
                        </div>
                      </div>
                    </div>


                    <?php
                    if($flag==1)
                    {
                      echo "<div class=\"clearfix visible-xs\"></div>";
                      $flag=0;
                    }
                    else
                    {
                    $flag=1;
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

                      $result=get_random_song_list();
                      if($result=="error")
                        {
                          echo "Latest Movies List Is Empty";
                          }
                        else
                            while($row = $result->fetch_assoc())
                            {

                      ?>

                        <div class="col-xs-6 col-sm-3">
                          <div class="item" onclick="postAndRedirect('track/',<?php echo $row['song_id'];?>,'2')">
                            <div class="pos-rlt">
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                  <a href="#"><i class="icon-arrow-down i-2x"></i></a>
                                </div>
                              </div>
                              <a href="#"><img src="<?php echo get_movie_poster_image($row['m_id']);?>" alt="" class="r r-2x img-full"></a>
                            </div>
                            <div class="padder-v">
                              <a href="#" class="text-ellipsis"><?php echo trim_song_name($row['song_name']);?></a>
                              <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $row['m_name']; ?></a>
                            </div>
                          </div>
                        </div>

                        <?php
                          }


                        ?>


                                       
                        
                       
                      </div>
                    </div>


                    <div class="col-md-5">
                      <h3 class="font-thin">Special Collections</h3>
                      <div class="list-group bg-white list-group-lg no-bg auto">  

                         <a href="#" class="list-group-item clearfix" onclick="postAndRedirect('track/',41,'1')">
                          <span class="pull-right h2 text-muted m-l">1</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/songs/How-to-Name-It_B.jpg" alt="...">
                          </span>
                          <span class="clear">
                            <span>How To Name It.?</span>
                            <small class="text-muted clear text-ellipsis">by Dan Doorack</small>
                          </span>
                        </a>                        
                        <a href="#" class="list-group-item clearfix" onclick="postAndRedirect('track/',60,'1')">
                          <span class="pull-right h2 text-muted m-l">2</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/songs/Golden-Hits-of-Kannadhasan-Vol-1_B.jpg" alt="...">
                          </span>
                          <span class="clear">
                            <span>Golden Hits Of Kannadasan</span>
                            <small class="text-muted clear text-ellipsis">by Chris Fox</small>
                          </span>
                        </a>
                        <a href="#" class="list-group-item clearfix" onclick="postAndRedirect('track/',20,'1')">
                          <span class="pull-right h2 text-muted m-l">3</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/songs/musical_notes_placeholder_81.png" alt="...">
                          </span>
                          <span class="clear">
                            <span>P.Susila Hits</span>
                            <small class="text-muted clear text-ellipsis">by Amanda Conlan</small>
                          </span>
                        </a>
                     
                        <a href="#" class="list-group-item clearfix" onclick="postAndRedirect('track/',111,'1')">
                          <span class="pull-right h2 text-muted m-l">4</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/songs/Voice-Of-Ilayaraja-Volume-1_B.jpg" alt="...">
                          </span>
                          <span class="clear">
                            <span>Voice of Ilayaraja </span>
                            <small class="text-muted clear text-ellipsis">by Lauren Taylor</small>
                          </span>
                        </a>
                        <a href="#" class="list-group-item clearfix" onclick="postAndRedirect('track/',352,'1')">
                          <span class="pull-right h2 text-muted m-l">5</span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <img src="images/songs/Vande-Mataram_b.jpg" alt="...">
                          </span>
                          <span class="clear">
                            <span>A.R.Rahman (Vande Mataram) Album</span>
                            <small class="text-muted clear text-ellipsis">by Dan Doorack</small>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                  
                </section>
                <footer class="footer bg-success">
                  <div id="jp_container_N">
                    <div class="jp-type-playlist">
                    
                          <div class="jp-controls">
                            <div><p>copy Rights</p></div>
                            
                          </div>
                 
                    </div>
                  </div>
                </footer>
              </section>
            </section>
            

            <!-- side content -->
         <aside class="aside-md bg-light dk" id="sidebar">
              <section class="vbox animated fadeInRight">
                <section class="w-f-md scrollable hover">
                  <h4 class="font-thin m-l-md m-t">Top Stars</h4>
                  <ul class="list-group no-bg no-borders auto m-t-n-xxs">

                  <?php  

                  $result=get_star_list_for_homepage();
                  if($result=="error")
                    {
                        echo "star hits List Is Empty";
                    }
                    else
                      while($row = $result->fetch_assoc())
                      {



                   ?>

                    <li class="list-group-item" onclick="postAndRedirectStar('movies/star/','<?php echo $row['artist'];?>')">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a8.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#"><?php echo $row['artist'];?></a></div>
                        <small class="text-muted " style="color:#4cb6cb;"><?php echo $row['count'];?> Movies</small>
                      </div>
                    </li>
                    <?php } ?>

                  </ul>
                </section>
                <footer class="footer footer-md bg-success">
                  
                </footer>
              </section>              
            </aside>
            <!-- / side content -->


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