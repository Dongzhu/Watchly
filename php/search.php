<?php require 'header.php';
    if(!isset($_SESSION['isLoggedin'])){
        header("location: intro.php");
    }
?>
<?php require_once 'navbar.php';?>
<?php require_once 'alert.php';?>

<?php
    require_once 'process.php';
    if(isset($_POST['q'])){
        $search = $_POST['q'];
        $Select_query = "SELECT * FROM movies WHERE movName LIKE '%$search%' OR movYear LIKE '%$search%';";
        $result = $mysql_connection->query($Select_query) or die($mysql_connection->error);
    }
?>

    <!-- Content Section -->
    <div class="container">    
        <h1 class=" fg-orange"><span class="fas fa-search"></span> Result :</h1> <br/>
	<div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-sm-3">
                <div class="panel panel-danger">
                    <div class="panel-heading"><strong><span class="fas fa-film"></span> <?php echo substr($row['movName'],0,30); ?></strong></div>
                    <div class="panel-body"><img src="<?php echo $row['movCover']; ?>" class="img-responsive img-rounded" style="width:100%" alt="Image"></div>
                    <div class="panel-footer"><a href="page.php/?p=video&v=<?php echo $row['movID']; ?>&vn=<?php echo $row['movName']; ?>" class="btn btn-orange"><span class="fas fa-play"></span> Watch Now</a></div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
		
    </div>
    <!--========================================================-->

<?php require 'footer.php';?>