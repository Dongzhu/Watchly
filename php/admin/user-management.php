<?php session_start();?>
<?php 
    require_once '../process.php';
    $Select_query = "SELECT * FROM users;";
    $result = $mysql_connection->query($Select_query) or die($mysql_connection->error);
    $data = '';
?>
<?php require_once 'header.php';?>

<?php if(isset($_SESSION['update-user'])): ?>
<?php $data = $_SESSION['data-user'];?>
<script>
    $(document).ready(function(){
      $("#editModal").modal({backdrop: "static"});
    });
</script>
<?php unset($_SESSION['update-user']);unset($_SESSION['data-user']);?>
<?php endif;?>
        
<div class="container-fluid">
    <div class="box">
        <div class="box-header"><h3><span class="fas fa-users"></span> User Management <button type="button" class="hidden btn btn-success btn-md" data-toggle="modal" data-target="#newModal" data-backdrop="static"><span class="fas fa-user-plus"></span> Add New User</button></h3></div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Reg Date</th>
                            <th colspan="2">Actions</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr id="<?php echo $row['userID']; ?>">
                            <td><?php echo $row['userID']; ?></td>
                            <td><?php echo $row['userFirstname']; ?></td>
                            <td><?php echo $row['userLastname']; ?></td>
                            <td><a href="../<?=$row['userPic'];?>" target="_blank"><img src="../<?=$row['userPic'];?>" class="img-responsive img-circle" style="width:30px; height: 30px; display: inline"></a> <?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['userAge']; ?></td>
                            <td><?php echo $row['userGender']; ?></td>
                            <td><?php echo $row['userType']; ?></td>
                            <td><?php echo $row['regDate']; ?></td>
                            <td><a href="../process.php/?edit-user=<?php echo $row['userID']; ?>" class="btn btn-info btn-md"><span class="fas fa-edit"></span></a></td>
                            <td><a href="../process.php/?admin-user-delete=<?php echo $row['userID']; ?>" class="btn btn-danger btn-md"><span class="fas fa-trash"></span></a></td>
                        </tr>
                        <?php endwhile;?>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" role="dialog" style="padding-top:40px">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close  fg-orange" data-dismiss="modal">&times;</button>
          <h3 id="modal-header" class="modal-title fg-orange"><span class="fas fa-edit"></span> Edit User Data</h3>
        </div>
          <div class="modal-body" style="width:70%; margin: 0 auto;">
             <form action="../process.php" method="POST">
                <input class="hidden" type="text" name="id" value="<?php echo $data['userID'];?>"/>
                <div class="form-group">
                    <label>Firstname</label>
                    <input class="form-control" type="text" name="firstname" value="<?php echo $data['userFirstname'];?>"/>
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input class="form-control" type="text" name="lastname" value="<?php echo $data['userLastname'];?>"/>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $data['username'];?>"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $data['email'];?>"/>
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input class="form-control" type="text" name="mobile" value="<?php echo $data['mobile'];?>"/>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" type="date" name="age" value="<?php echo $data['userAge'];?>"/>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender" value="<?php echo $data['userGender'];?>">
                        <option value="Male" <?php if($data['userGender'] === "Male"){ echo selected;}?>>Male</option>
                        <option value="Female" <?php if($data['userGender'] === "Female"){ echo selected;}?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" value="<?php echo $data['userType'];?>">
                        <option value="User" <?php if($data['userType'] === "User"){ echo selected;}?>>User</option>
                        <option value="Admin" <?php if($data['userType'] === "Admin"){ echo selected;}?>>Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <input class="form-control" type="text" name="profilePic" value="<?php echo $data['userPic'];?>"/>
                </div>
                <div class="form-group text-center">
                    <input class="btn btn-orange" type="submit" name="admin-user-update" value="Update User" style="width: 50%"/>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

