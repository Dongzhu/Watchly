<?php
session_start();

$mysql_connection = new mysqli('localhost', 'id8302607_admin', 'watchly@2018', 'id8302607_watchly') or die(mysqli_error($mysql_connection));
//$mysql_connection = new mysqli('localhost', 'root', '123456', 'watchly') or die(mysqli_error($mysql_connection));


if(isset($_POST['admin-movie-new'])){
    $movName = $_POST['movName'];
    $movCover = $_POST['movCover'];
    $movPoster = $_POST['movPoster'];
    $movRate = $_POST['movRate'];
    $movYear = $_POST['movYear'];
    $mov1080 = $_POST['mov1080'];
    $mov720 = $_POST['mov720'];
    $mov480 = $_POST['mov480'];
    $mov360 = $_POST['mov360'];
    
    $add_movie_query = "INSERT INTO movies (movName, movYear, movRate, movCover, movPoster, mov1080, mov720, mov480, mov360) "
            . "VALUES('$movName', '$movYear', '$movRate', '$movCover', '$movPoster', '$mov1080', '$mov720', '$mov480', '$mov360');";
    $mysql_connection->query($add_movie_query) or die($mysql_connection->error);
    
    $_SESSION['message'] = "New movie added successfully.";
    $_SESSION['msg-type'] = "success";
    
    header("location: page.php/?p=movie-management");
}

if(isset($_GET['admin-movie-delete'])){
    
    $delID = $_GET['admin-movie-delete'];
    $query = "DELETE FROM movies WHERE movID='$delID'";
    $mysql_connection->query($query) or die($mysql_connection->error);
    
    $_SESSION['message'] = "Movie deleted successfully.";
    $_SESSION['msg-type'] = "success";
    
    header("location: ../page.php/?p=movie-management");
    
}

if(isset($_GET['edit-movie'])){
    $id = $_GET['edit-movie'];
    $Select_query = "SELECT * FROM movies WHERE movID='$id';";
    $result = $mysql_connection->query($Select_query) or die($mysql_connection->error);
    $_SESSION['data-movie'] = $result->fetch_assoc();
    $_SESSION['update-movie'] = true;
    header("location: ../page.php/?p=movie-management");
}

if(isset($_POST['admin-movie-update'])){
    $id = $_POST['id'];
    $movCover = $_POST['movCover'];
    $movPoster = $_POST['movPoster'];
    $movRate = $_POST['movRate'];
    $movYear = $_POST['movYear'];
    $mov1080 = $_POST['mov1080'];
    $mov720 = $_POST['mov720'];
    $mov480 = $_POST['mov480'];
    $mov360 = $_POST['mov360'];
    
    $query = "UPDATE movies SET movCover='$movCover',movPoster='$movPoster',movRate='$movRate',movYear='$movYear',mov1080='$mov1080',mov720='$mov720',mov480='$mov480',mov360='$mov360' WHERE movID='$id';";
    
    try {
        $mysql_connection->query($query);
        $_SESSION['message'] = "Movie Updated successfully.";
        $_SESSION['msg-type'] = "success";
        header("location: page.php/?p=movie-management");
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: page.php/?p=movie-management");
    }
}

if(isset($_POST['reg'])){
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    
    $add_user_query = "INSERT INTO users (userFirstname, userLastname, username, password, email, mobile, userAge, userGender) "
            . "VALUES('$first', '$last', '$user', '$pass', '$email', '$mobile','$age', '$gender');";
    
    
    try {
        $mysql_connection->query($add_user_query);
        $_SESSION['message'] = "Account created successfully.";
        $_SESSION['msg-type'] = "success";
        header("location: login.php");
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: reg.php");
    }
    
    
}

if(isset($_POST['login'])){
    $user1 = $_POST['user'];
    $pass = md5($_POST['pass']);
    $keep = FALSE;
    if(isset($_POST['keep-login'])){
        $keep = TRUE;
    }
    $login_query = "SELECT * FROM users WHERE username='$user1';";
    try {
        $result = $mysql_connection->query($login_query);
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if($pass === strtolower($user['password'])){
                if($keep){
                    // KLUN stands for ( Keep Login User Name )
                    setcookie('KLUN', $user['username'], time() + (86400 * 7), "/"); // 86400 = 1 day
                    setcookie('KLUNP', $user['userPic'], time() + (86400 * 7), "/"); // 86400 = 1 day
                }
                $_SESSION['userArray'] = $user;
                $_SESSION['isLoggedin'] = true;
                $_SESSION['message'] = "Login successfully.";
                if($user['userPic'] === '../img/user-circle.png'){
                    $_SESSION['message'] = 'Login successfully.<a href="page.php/?p=profile"> Click here to upload your profile picture now</a>';
                }
                $_SESSION['msg-type'] = "success";
                header("location: index.php");
            }else{
                $_SESSION['message'] = "Password is incorrrect";
                $_SESSION['msg-type'] = "danger";
                header("location: login.php");
            }
        }else{
            $_SESSION['message'] = "User not found";
            $_SESSION['msg-type'] = "danger";
            header("location: login.php");
        }
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: login.php");
    }
}

if(isset($_GET['admin-user-delete'])){
    
    $delID = $_GET['admin-user-delete'];
    $query = "DELETE FROM users WHERE userID='$delID'";
    $mysql_connection->query($query) or die($mysql_connection->error);
    
    $_SESSION['message'] = "User deleted successfully.";
    $_SESSION['msg-type'] = "success";
    
    header("location: ../page.php/?p=user-management");
    
}

if(isset($_POST['admin-user-Reg'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    
    $add_user_query = "INSERT INTO users (username, password, email, userType, userGender, userAge) "
            . "VALUES('$user', '$pass', '$email', '$role', '$gender', '$age');";
    
    
    try {
        $mysql_connection->query($add_user_query);
        $_SESSION['message'] = "User created successfully.";
        $_SESSION['msg-type'] = "success";
        header("location: page.php/?p=user-management");
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: page.php/?p=user-management");
    }
    
    
}

if(isset($_GET['edit-user'])){
    $id = $_GET['edit-user'];
    $Select_query = "SELECT * FROM users WHERE userID='$id';";
    $result = $mysql_connection->query($Select_query) or die($mysql_connection->error);
    $_SESSION['data-user'] = $result->fetch_assoc();
    $_SESSION['update-user'] = true;
    header("location: ../page.php/?p=user-management");
}

if(isset($_POST['admin-user-update'])){
    $id = $_POST['id'];
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $proPic = $_POST['profilePic'];
    
    $query = "UPDATE users SET userFirstname='$first',userLastname='$last',username='$user',email='$email',mobile='$mobile',userPic='$proPic',userType='$role',userAge='$age',userGender='$gender' WHERE userID='$id';";
    
    try {
        $mysql_connection->query($query);
        $_SESSION['message'] = "User Updated successfully.";
        $_SESSION['msg-type'] = "success";
        header("location: page.php/?p=user-management");
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: page.php/?p=user-management");
    }
}

if(isset($_POST['KLUN'])){
    $user = $_POST['KLUN'];
    $login_query = "SELECT * FROM users WHERE username='$user';";
    try {
        $result = $mysql_connection->query($login_query);
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $_SESSION['userArray'] = $user;
            $_SESSION['isLoggedin'] = true;
            $_SESSION['message'] = "Welcome back ".$user['username'];
            $_SESSION['msg-type'] = "success";
            header("location: index.php");
        }else{
            $_SESSION['message'] = "User not found";
            $_SESSION['msg-type'] = "danger";
            header("location: login.php");
        }
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: login.php");
    }
}

if(isset($_POST['update-picture'])){
    $id = $_SESSION['userArray']['userID'];
    $target_dir = "../img/users-profile-picture/";
    $target_file = $target_dir . basename($_FILES["userPic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $target_file = $target_dir . 'pic_' . $id. '.' .$imageFileType;
    $uploadOk = 1;
    if ($uploadOk == 0) {
        $_SESSION['message'] = 'Validation Error';
        $_SESSION['msg-type'] = "danger";
        header("location: page.php/?p=profile");
    } else {
        if (move_uploaded_file($_FILES["userPic"]["tmp_name"], $target_file)) {
            
        } else {
            $_SESSION['message'] = 'Error while uploading file';
            $_SESSION['msg-type'] = "danger";
            header("location: page.php/?p=profile");
        }
    }
    $query = "UPDATE users SET userPic='$target_file' WHERE userID='$id';";
    try {
        $mysql_connection->query($query);
        $_SESSION['userArray']['userPic'] = $target_file;
        setcookie('KLUNP', $target_file, time() + (86400 * 7), "/"); // 86400 = 1 day
        $_SESSION['message'] = "Photo Updated successfully.";
        $_SESSION['msg-type'] = "success";
        header("location: page.php/?p=profile");
    }catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['msg-type'] = "danger";
        header("location: page.php/?p=profile");
    }
}
