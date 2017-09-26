<?php






$connection = mysqli_connect("localhost","root","","music") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db

    $sql = "select * from movies_table limit 10";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $movie=array();
    $songs=array();
    $final_movie_song=array();

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
        $movie[]=array('movie'=>$row,'songs'=>get_songs(1));
        
        

    }

    $finaldata=array("records"=>$movie);

    echo json_encode($finaldata);


    function get_songs($movie_id)
    {
        $connection = mysqli_connect("localhost","root","","music") or die("Error " . mysqli_error($connection));
            $sql="select * from songs_table where m_id=1";
            $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

            $song = array();
            while($row =mysqli_fetch_assoc($result))
                {
                    $song[] = $row;
                }

           

            return $song;

    }

    //$records=array("records"=>$emparray);



    //echo json_encode($final_movie_song);



// 


    //close the db connection
    mysqli_close($connection);

?>