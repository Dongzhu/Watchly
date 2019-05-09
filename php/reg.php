<?php require_once 'header.php';?>
<?php require_once 'alert.php';?>
<?php $_SESSION['page-title'] = 'Watchly - Create Account';?>

<div class="container" style="padding-bottom: 40px; padding-top: 80px; width: 70%">
    <div class="row">
        <div class="col-sm-2"></div>
        <form class="col-sm-8" action="process.php" method="POST" autocomplete="off">
            <h1 class="fg-orange"><span class="fas fa-user-plus"></span> Create Account:</h1>
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
            <div class="form-group">
                <label><span class="fas fa-envelope"></span> Email</label>
                <input class="form-control" type="email" name="email" placeholder="Enter your e-mail" required/>
            </div>
            <div class="form-group">
                <label><span class="fas fa-calendar-alt"></span> Birth Day</label>
                <input class="form-control" type="date" name="age" placeholder="Enter your age" required/>
            </div>
            <div class="form-group">
                <label><span class="fas fa-male"></span><span class="fas fa-female"></span> Gender</label>
                <br/>
                <div class="input-group" style="display: inline">
                    <label class="radio-container" style="padding: 4px 36px"> Male
                        <input type="radio" name="gender" value="Male" required>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="input-group" style="display: inline">
                    <label class="radio-container" style="padding: 4px 36px"> Female
                        <input type="radio" name="gender" value="Female" required>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <br>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-orange" type="submit" name="reg" value="Create Account" style="width: 50%"/>
            </div>
        </form>
    </div>
</div>

<?php require_once 'footer.php';?>