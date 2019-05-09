<?php session_start();?>
<?php 
    require_once '../process.php';
    $Select_query = "SELECT * FROM movies;";
    $result = $mysql_connection->query($Select_query) or die($mysql_connection->error);
    $data = '';
?>
<?php require_once 'header.php';?>

<?php if(isset($_SESSION['update-movie'])): ?>
<?php $data = $_SESSION['data-movie'];?>
<script>
    $(document).ready(function(){
      $("#editMovModal").modal({backdrop: "static"});
    });
</script>
<?php unset($_SESSION['update-movie']);unset($_SESSION['data-movie']);?>
<?php endif;?>

<div class="container-fluid">
    <div class="box">
        <div class="box-header"><h3><span class="fas fa-film"></span> Movie Management <button type="button" class="hidden btn btn-success btn-md" data-toggle="modal" data-target="#newModal" data-backdrop="static"><span class="fas fa-plus"></span> Add New Movie</button></h3></div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Rate</th>
                            <th>Views</th>
                            <th>Cover</th>
                            <th>Poster</th>
                            <th>1080p</th>
                            <th>720p</th>
                            <th>480p</th>
                            <th>360p</th>
                            <th>Add Date</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['movID']; ?></td>
                            <td><?php echo $row['movName']; ?></td>
                            <td><?php echo $row['movYear']; ?></td>
                            <td><?php echo $row['movRate']; ?></td>
                            <td><?php echo $row['movViews']; ?></td>
                            <td><a href="<?php echo $row['movCover']; ?>" target="_blank"><?php echo $row['movName']; ?> Cover Link</a></td>
                            <td><a href="<?php echo $row['movPoster']; ?>" target="_blank"><?php echo $row['movName']; ?> Poster Link</a></td>
                            <td><a href="<?php echo $row['mov1080']; ?>" target="_blank"><?php echo $row['movName']; ?> 1080p Link</a></td>
                            <td><a href="<?php echo $row['mov720']; ?>" target="_blank"><?php echo $row['movName']; ?> 720p Link</a></td>
                            <td><a href="<?php echo $row['mov480']; ?>" target="_blank"><?php echo $row['movName']; ?> 480p Link</a></td>
                            <td><a href="<?php echo $row['mov360']; ?>" target="_blank"><?php echo $row['movName']; ?> 360p Link</a></td>
                            <td><?php echo $row['addedDate']; ?></td>
                            <td><a href="../process.php/?edit-movie=<?php echo $row['movID']; ?>" class="btn btn-info btn-md"><span class="fas fa-edit"></span></a></td>
                            <td><a href="../process.php/?admin-movie-delete=<?php echo $row['movID']; ?>" class="btn btn-danger btn-md"><span class="fas fa-trash"></span></a></td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editMovModal" role="dialog" style="padding-top:40px">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close  fg-orange" data-dismiss="modal">&times;</button>
          <h3 id="modal-header" class="modal-title fg-orange"><span class="fas fa-edit"></span> Edit <?php echo $data['movName'];?> Data</h3>
        </div>
          <div class="modal-body" style="width:70%; margin: 0 auto;">
             <form action="../process.php" method="POST">
                <input class="hidden" type="text" name="id" value="<?php echo $data['movID'];?>"/>
                <div class="form-group">
                    <label>Year</label>
                    <input class="form-control" type="number" min="1950" max="2050" name="movYear" value="<?php echo $data['movYear'];?>"/>
                </div>
                <div class="form-group">
                    <label>Rate</label>
                    <input class="form-control" type="number" min="0" max="10" step=".1" name="movRate" value="<?php echo $data['movRate'];?>"/>
                </div>
                <div class="form-group">
                    <label>Cover</label>
                    <input class="form-control" type="text" name="movCover" value="<?php echo $data['movCover'];?>"/>
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <input class="form-control" type="text" name="movPoster" value="<?php echo $data['movPoster'];?>"/>
                </div>
                <div class="form-group">
                    <label>Quality 1080p</label>
                    <input class="form-control" type="text" name="mov1080" value="<?php echo $data['mov1080'];?>"/>
                </div>
                <div class="form-group">
                    <label>Quality 720p</label>
                    <input class="form-control" type="text" name="mov720" value="<?php echo $data['mov720'];?>"/>
                </div>
                <div class="form-group">
                    <label>Quality 480p</label>
                    <input class="form-control" type="text" name="mov480" value="<?php echo $data['mov480'];?>"/>
                </div>
                <div class="form-group">
                    <label>Quality 360p</label>
                    <input class="form-control" type="text" name="mov360" value="<?php echo $data['mov360'];?>"/>
                </div>
                <div class="form-group text-center">
                    <input class="btn btn-orange" type="submit" name="admin-movie-update" value="Update Movie" style="width: 50%"/>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
