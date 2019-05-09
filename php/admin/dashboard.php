<?php require_once 'header.php';?>
<?php

    require_once '../process.php';
    $user_count_query = "SELECT COUNT(*) AS 'userCount' FROM users";
    $movie_count_query = "SELECT COUNT(*) AS 'movieCount' FROM movies";
    $view_count_query = "SELECT SUM(movViews) AS 'viewCount' FROM movies";
        
    $result = $mysql_connection->query($user_count_query) or die($mysql_connection->error);
    $data = $result->fetch_assoc();
    $user_count = $data['userCount'];
    $result1 = $mysql_connection->query($movie_count_query) or die($mysql_connection->error);
    $data1 = $result1->fetch_assoc();
    $movie_count = $data1['movieCount'];
    $result2 = $mysql_connection->query($view_count_query) or die($mysql_connection->error);
    $data2 = $result2->fetch_assoc();
    $view_count = $data2['viewCount'];
?>
<h3><span class="fas fa-tachometer-alt"></span> Dashboard</h3>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 fg-white">
            <div class="panel-body bg-dark" style="border-radius: 8px">
                <span class="fas fa-users" style="font-size: 75px; width: 100%">
                    <h3 style="display: inline;float: right;padding: 0px 16px 0px 0px;">
                        <?=$user_count;?>
                    </h3>
                </span>
                <h3>Number of Users</h3>
            </div>
        </div>
        <div class="col-sm-3 fg-white">
            <div class="panel-body bg-blue" style="border-radius: 8px">
                <span class="fas fa-film" style="font-size: 75px; width: 100%">
                    <h3 style="display: inline;float: right;padding: 0px 16px 0px 0px;">
                        <?=$movie_count;?>
                    </h3>
                </span>
                <h3>Number of Movies</h3>
            </div>
        </div>
        <div class="col-sm-3 fg-white">
            <div class="panel-body bg-teal" style="border-radius: 8px">
                <span class="fas fa-eye" style="font-size: 75px; width: 100%">
                    <h3 style="display: inline;float: right;padding: 0px 16px 0px 0px;">
                        <?=$view_count;?>
                    </h3>
                </span>
                <h3>Number of Views</h3>
            </div>
        </div>
    </div>
</div>