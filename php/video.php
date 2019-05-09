<?php
require_once 'header.php';
require_once 'navbar.php';
?>
<?php
    if(!isset($_SESSION['v'])){
        header("location: index.php");
    }
    require_once 'process.php';
    $videoID = $_SESSION['v'];
    $video_query = "SELECT * FROM movies WHERE movID='$videoID';";
    $video_views = null;
    try {
        $result = $mysql_connection->query($video_query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $video_views = $row['movViews'] + 1;
            $mysql_connection->query("UPDATE movies SET movViews='$video_views' WHERE movID='$videoID';");
        }
    } catch (Exception $e){
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: index.php");
    }
?>

<div class="container-fluid" style="padding-top: 20px">    
    <div class="row">
        <div class="col-sm-7">
            <div class="panel panel-danger">
                <div class="panel-heading"><h4><strong><span class="fas fa-film"></span> <?php echo $row['movName']; ?></strong></h4></div>
                <div class="panel-body embed-responsive embed-responsive-16by9 carousel slide">
                    <video id="video" class="video-js vjs-default-skin vjs-big-play-centered embed-responsive-item" controls poster="<?php echo $row['movPoster']; ?>" data-setup='{}'>
                        <source src="<?php echo $row['mov1080']; ?>" type='video/mp4' label='1080p' res='1080'>
                        <source src="<?php echo $row['mov720']; ?>" type='video/mp4' label='720p' res='720'>
                        <source src="<?php echo $row['mov480']; ?>" type='video/mp4' label='480p' res='480'>
                        <source src="<?php echo $row['mov360']; ?>" type='video/mp4' label='360p' res='360'>						
                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                    </video>
                    <button id="play-btn" class="carousel-control" onClick="play();" style="width: 100%;font-size: 48px;"><span class="fas fa-play fg-orange"></span></button>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="panel panel-info">
                <div class="panel-heading"><h4><strong><span class="fas fa-info-circle"></span> Movie Details:</strong></h4></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src='<?=$row['movCover'];?>' class="img-responsive img-rounded" style="width: 200px;height: auto;margin: auto" alt="Movie Cover Photo"/>
                            <br/>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-user-information">
                                <tbody>
                                  <tr>
                                    <th style="width:30%">Name:</th><td><?=$row['movName'];?></td>
                                  </tr>
                                  <tr>
                                    <th>Year:</th><td><?=$row['movYear'];?></td>
                                  </tr>
                                  <tr>
                                    <th>Views:</th><td><?=$row['movViews'];?></td>
                                  </tr>
                                  <tr>
                                    <th>Rate:</th><td><?=$row['movRate'];?></td>
                                  </tr>
                                  <tr>
                                    <th>Date:</th><td><?=$row['addedDate'];?></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require 'footer.php';?>