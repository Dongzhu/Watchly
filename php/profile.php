<?php require 'header.php';?>
<?php 
    if(!isset($_SESSION['isLoggedin'])){
        header("location: intro.php");
    }
?>
<?php require_once 'navbar.php';?>
<?php require_once 'alert.php';?>

<?php $user = $_SESSION['userArray'];?>


<div class="container" style="padding-top: 80px">
    <div class="panel panel-danger">
        <div class="panel-heading"><h4><i class="fas fa-user"></i> User Information</h4></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="center-block">
                        <img src='<?=$user['userPic'];?>' class="img-responsive img-circle" style="width: 300px;height: 300px;margin: auto" alt="Profile Picture"/>
                        <br/>
                        <button id="profile-pic-edit-btn" class="btn btn-orange"><span class="fas fa-edit"></span> Edit</button>
                        <form id="update-pic-form" class="hidden" action="process.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="userPic" id="file-3" class="inputfile inputfile-3" style="display: none" required/>
                            <label for="file-3" style="width: 100%;text-align: center;"><i class="fas fa-upload"></i> <span>Choose a file&hellip;</span></label>
                            <button class="btn btn-orange" type="submit" name="update-picture"><span class="fas fa-save"></span> Update</button>
                        </div>
                        </form>
                    </div>
                    <br/>
                </div>
                <div class="col-md-8">
                    <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <th style="width:30%">Firstname:</th><td><?=$user['userFirstname'];?></td>
                          </tr>
                          <tr>
                            <th>Lastname:</th><td><?=$user['userLastname'];?></td>
                          </tr>
                          <tr>
                            <th>Username:</th><td><?=$user['username'];?></td>
                          </tr>
                          <tr>
                            <th>Birthday:</th><td><?=$user['userAge'];?></td>
                          </tr>
                          <tr>
                            <th>Gender:</th><td><?=$user['userGender'];?></td>
                          </tr>
                          <tr>
                            <th>Email:</th><td><?=$user['email'];?></td>
                          </tr>
                          <tr>
                            <th>Phone Number:</th><td><?=$user['mobile'];?></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#profile-pic-edit-btn").click(function(){
            $("#profile-pic-edit-btn").hide();
            $("#update-pic-form").removeClass("hidden");
        });
    });
</script>
<?php require 'footer.php';?>