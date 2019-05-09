<?php require_once 'header.php';?>
<?php require_once 'alert.php';?>
<?php $_SESSION['page-title'] = 'Watchly - Login';?>

<div class="container" style="padding-bottom: 40px; padding-top: 100px; width: 70%">
    <div class="row">
        <div class="col-sm-2"></div>
        <form class="col-sm-8" action="process.php" method="POST" autocomplete="off">
            <h1 class="fg-orange"><span class="fas fa-sign-in-alt"></span> Login:</h1>
            <br/>
            <div class="form-group">
                <label><span class="fas fa-user"></span> Username</label>
                <input class="form-control" type="text" name="user" placeholder="Enter your username" required/>
            </div>
            <div class="form-group">
                <label><span class="fas fa-lock"></span> Password</label>
                <div class="input-group">
                    <input id="pwd" class="form-control" type="password" name="pass" placeholder="Enter your password" required/>
                    <i class="input-group-addon" onclick="pwdToggle()" style="cursor: pointer">
                        <span id="pwdIcon" class="fas fa-eye"></span>
                    </i>
                </div>
            </div>
            <div class="input-group">
                <label class="check-container" style="padding: 3px 36px"> Remember me
                    <input type="checkbox" name="keep-login" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-orange" type="submit" name="login" value="Login" style="width: 50%"/>
            </div>
        </form>
    </div>
</div>
<br/>

<?php require_once 'footer.php';?>