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
  
function pagination_post_method(url,page)
{

 
  var postFormStr = "<form method='POST' action='" + url + "'>\n";
     postFormStr += "<input type='hidden' name='page' value='" + page + "'></input>";
  var formElement = $(postFormStr);
  $('body').append(formElement);
    $(formElement).submit();

}



function postAndRedirect(url, postData)
{
    var postFormStr = "<form method='POST' action='" + url + "'>\n";

    postFormStr += "<input type='hidden' name='video_id' value='" + postData + "'></input>";                  
    postFormStr += "</form>";

    var formElement = $(postFormStr);

    $('body').append(formElement);
    $(formElement).submit();
}


</script>


</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-danger ">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="http://parser-logavdm1.rhcloud.com/" class="navbar-brand text-lt">
          
          <img src="../images/logo.png" alt="." class="">
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
                        
                        <span class="font-bold">Movies</span>
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
                      <a href="video.php" data-target="#content" data-el="#bjax-el" data-replace="true">
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
            <section class="scrollable padder-lg">
              <h2 class="font-thin m-b">Video</h2>
              <div class="row row-sm">

            <?php   

            include "../admin/functions.php";

              $result=get_latest_video();

              while($row = $result->fetch_assoc()) {

                ?>

<div class="col-xs-12 col-sm-4">
                  <div class="item" onclick="postAndRedirect('player/',<?php echo $row['sno'];?>)">
                    <div class="pos-rlt">
                      <div class="item-overlay opacity r r-2x bg-black">
                        <div class="center text-center m-t-n">
                          <a href="video-detail.html"><i class="fa fa-play-circle i-2x"></i></a>
                        </div>
                      </div>
                      <div class="top">
                        <span class="badge bg-dark m-l-sm m-t-sm"><?php echo $row['quality'];?></span>
                      </div>
                      <a href="video-detail.html"><?php echo "<img src='".$row['v_poster_image']."' alt='' class='r r-2x img-full' style='max-height:250px;'>";?>
                      </a>
                    </div>
                    <div class="padder-v">
                      <a href="video-detail.html" class="text-ellipsis"><?php echo $row['video_name'];?></a>
                      <a href="video-detail.html" class="text-ellipsis text-xs text-muted"><?php echo $row['v_release_year'];?></a>
                    </div>
                  </div>
                </div>


                <?php
              }

            ?>

                


               
              </div>
              <h3 class="font-thin m-b">Video List</h3>
              <div class="row row-sm">


<?php

                              $rpp = 16; // results per page
                              $adjacents = 4;
                              

                              if(isset($_POST['page']))
                                $page=$_POST['page'];
                              else
                              $page=1;
                              if($page<=0) $page = 1;
                              $reload = $_SERVER['PHP_SELF'];

                              $link_id =connect_db();

                              $sql = "SELECT * FROM videos";

                              $result = $link_id->query($sql);
                              $tcount = $result->num_rows;
                              $tpages = ($tcount) ? ceil($tcount/$rpp) : 1;
                              $count = 0;
                              $i = ($page-1)*$rpp;
                              while(($count<$rpp) && ($i<$tcount)) {
                                mysqli_data_seek($result,$i);
                             $query = $result->fetch_assoc();

                             ?>


                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="item" onclick="postAndRedirect('player/',<?php echo $query['sno'];?>)">
                    <div class="pos-rlt">
                      <div class="item-overlay opacity r r-2x bg-black">
                       <span class="badge bg-dark m-l-sm m-t-sm"><?php echo $query['quality'];?></span>
                        <div class="center text-center m-t-n">
                          <a href="video-detail.html"><i class="fa fa-play-circle i-2x"></i></a>
                        </div>
                      </div>
                      <a href="video-detail.html"><?php echo "<img src='".$query['v_poster_image']."' alt='' class='r r-2x img-full' style='max-height:250px;max-width:250px;min-width:250px;min-height:250px;'>";?></a>
                    </div>
                    <div class="padder-v">
                      <a href="video-detail.html" class="text-ellipsis"><?php echo $query['video_name'];?></a>
                      <a href="video-detail.html" class="text-ellipsis text-xs text-muted"><?php echo $query['v_release_year'];?></a>
                    </div>
                  </div>
                </div>

                <?php

                              $i++;
                             $count++;
                           }

                ?>



                
              </div>
             <?php echo  paginate_videos($reload, $page, $tpages, $adjacents);?>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
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