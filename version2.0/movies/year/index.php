<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>starMusiq</title>
  <link rel="stylesheet" href="../../js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../../css/app.css" type="text/css" />
  <script src="../../js/jquery.min.js"></script>  
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

function filter_post_method(url,filtervar,filtervalue,page)
{
  var postFormStr = "<form method='POST' action='" + url + "'>\n";
  postFormStr += "<input type='hidden' name='filter' value='" + filtervalue + "'></input>";
  postFormStr += "<input type='hidden' name='page' value='" + page + "'></input>";
  postFormStr += "</form>";
  var formElement = $(postFormStr);
  $('body').append(formElement);
    $(formElement).submit();



}

function pagination_post_method(url,filtervalue,page)
{

 
  var postFormStr = "<form method='POST' action='" + url + "'>\n";
  if (filtervalue!='none')
  postFormStr += "<input type='hidden' name='filter' value='" + filtervalue + "'></input>";
  postFormStr += "<input type='hidden' name='page' value='" + page + "'></input>";
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

postAndRedirect('../../track/',matches,'1');


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
url: "../../admin/get_movies_name.php",
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
      <div class="navbar-header aside bg-info  ">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="http://parser-logavdm1.rhcloud.com/" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">starMusiq</span>
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
                      <a href="http://parser-logavdm1.rhcloud.com/">
                        <i class="icon-disc icon  "></i>
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
                          <a class="auto">                                                        
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
                        <i class="icon-drawer icon  "></i>
                        <span class="font-bold">Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="listen.html">
                        <i class="icon-list icon   "></i>
                        <span class="font-bold">Listen</span>
                      </a>
                    </li>
                    <li>
                      <a href="video.html" data-target="#content" data-el="#bjax-el" data-replace="true">
                        <i class="icon-social-youtube icon   "></i>
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
          <section class="vbox">
            <section class="w-f-md" id="bjax-target">
              <section class="hbox stretch">
                <!-- side content -->
                <aside class="aside bg-light dk" id="sidebar">
                  <section class="vbox animated fadeInUp">
                    <section class="scrollable hover">
                      <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto">
                        <?php  if(isset($_POST['filter']))
                        {
                          
                          if($_POST['filter']=='none')
                           echo "<a class=\"list-group-item active\">";
                         else
                          echo "<a href=\"http://parser-logavdm1.rhcloud.com//movies/year/\" class=\"list-group-item \">";

                        }
                        else
                        {
                          echo "<a class=\"list-group-item active\">";
                        }

                        ?>

                        
                          All <label class=" label bg-info m-l-xs pull-right">

                          <?php 
                          include("../../admin/functions.php");
                          echo total_movies_count("All");
                           ?></label>
                         </a>
                        
                          <?php echo get_yearswise_movies();?>
                       
                      </div>
                    </section>
                  </section>
                </aside>
                <!-- / side content -->
                <section>
                  <section class="vbox">
                    <section class="scrollable padder-lg">
                      <h2 class="font-thin m-b">Movies</h2>
                      <div class="row row-sm">

                          <?php

                              $rpp = 18; // results per page
                              $adjacents = 4;
                              

                              if(isset($_POST['page']))
                                $page=$_POST['page'];
                              else
                              $page=1;
                              if($page<=0) $page = 1;
                              $reload = $_SERVER['PHP_SELF'];

                              $link_id = new mysqli('127.11.252.130', 'admintQmFIvk', '19KQAcrafwEk', 'parser'); or die(mysql_error());
                              if(isset($_POST['filter']))
                                $sql = "SELECT * FROM movies_table WHERE release_year=".$_POST['filter'];
                                else
                                  $sql = "SELECT * FROM movies_table ";    
                              
                              $result = $link_id->query($sql);
                              $tcount = $result->num_rows;
                              $tpages = ($tcount) ? ceil($tcount/$rpp) : 1;
                              $count = 0;
                              $i = ($page-1)*$rpp;
                              while(($count<$rpp) && ($i<$tcount)) {
                                mysqli_data_seek($result,$i);
                             $query = $result->fetch_assoc();

                          
                             ?>


                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                          <div class="item" onclick="postAndRedirect('../../track/',<?php echo $query['movie_id'];?>,'1')">
                            <div class="pos-rlt">
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                  <a href="#"><i class="icon-arrow-down i-2x"></i></a>
                                </div>
                              </div>
                              <a><img src="<?php echo $query['movie_poster_image']; ?>" alt="" class="r r-2x img-full"></a>
                            </div>
                            <div class="padder-v">
                              <a data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis"><?php echo $query['movie_name']; ?></a>
                              <a  data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis text-xs text-muted"><?php echo $query['artist']; ?></a>
                            </div>
                          </div>
                        </div>
                             <?php

                             

                              $i++;
                             $count++;
                              }

                              
                              
                              echo "</div>";
                              if (isset($_POST['filter'])) {

                                ?>
                                <script type="text/javascript">
                                                                  
                                  $(document).ready(function(){
                                  var active_li="<?php echo $_POST['filter']?>"+' Hits';
                                  
                                  $('a:contains('+active_li+')').addClass('active');

                                  $('a:contains('+active_li+')').addClass('bg-danger');
                                  $('a:contains('+active_li+')').removeClass('bg-info');
                                  $('a:contains('+active_li+')').addClass('dk');
                                  
                                 // location.hash = $('a:contains('+active_li+')');
                                 $obj=$("a.active")[0];

                                  $obj.scrollIntoView(); 
                                 
                                });

                                </script>
                                <?php
                                echo  paginate_year($reload, $page, $tpages, $adjacents,$_POST['filter']);
                              }
                              else
                              {
                                echo  paginate_year($reload, $page, $tpages, $adjacents,'none');
                              }
                              
                          ?>

                                      
                      
                    </section>                    
                  </section>
                </section>
              </section>
            </section>
            <footer class="footer bg-success dker">
              
            </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>

<script type="text/javascript">
    $(document).ready(function(){
 

    })


  </script>
  
  <!-- Bootstrap -->
  <script src="../../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../../js/app.js"></script>  
  <script src="../../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../js/app.plugin.js"></script>
  <script type="text/javascript" src="../../js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="../../js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="../../js/jPlayer/demo.js"></script>
</body>
</html>