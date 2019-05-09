<?php if(isset($_SESSION['isLoggedin'])):?>
<!-- jumbotron section -->
<div class="jumbotron" id="myPage">
    <div class="container text-center" style="font-family: 'Pacifico', cursive;">
        <h1>Watchly<span class="fas fa-play logo"></span></h1>      
        <p>Enjoy, Entertain and Chill with the newest online movies,</p>
        <p>series and shows in the world.</p>
    </div>
</div>
<!--========================================================-->
<?php endif;?>

<?php if(!isset($_SESSION['isLoggedin'])):?>
<!-- jumbotron section -->
<div class="jumbotron intro" id="myPage">
    <div class="container text-center" style="font-family: 'Pacifico', cursive;">
        <h1>Watchly<span class="fas fa-play logo"></span></h1>      
        <p>Enjoy, Entertain and Chill with the newest online movies,</p>
        <p>series and shows in the world.</p>
        <p>To enjoy with our services make sure to login to your account, if you not a user consider to create your account.</p>
        <br/>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3 text-center"><a href="page.php/?p=login" class="btn btn-orange">Login</a></div>
            <div class="col-sm-3 text-center"><a href="page.php/?p=reg" class="btn btn-orange">Create Account</a></div>
            <div class="col-sm-3"></div>
        </div>
        <?php if(isset($_COOKIE['KLUN'])):?>
        <div class="row">
            <br/>
            <h3><i class="fas fa-users"></i>Loggedin users:</h3>
            <br/>
            <div class="col-sm-3 text-center"></div>
            
            <div class="col-sm-3 text-center" data-toggle="tooltip" data-placement="bottom" title="Login as <?=$_COOKIE['KLUN'];?>">
                <div class="panel" style="border: 1px solid #fff;background-color: transparent;">
                    <div class="panel-heading"><strong><?=$_COOKIE['KLUN'];?></strong></div>
                    <div class="panel-body">
                        <form action="process.php" method="POST" class="form-inline fg-orange" autocomplete="off">
                            <input type="hidden" name="KLUN" value="<?=$_COOKIE['KLUN'];?>" class="">
                            <button type="submit" style="border: 0px;background-color: transparent;">
                                <img src="<?=$_COOKIE['KLUNP'];?>" class="img-responsive img-circle" style="width:200px; height: 200px" alt="Image">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <?php endif;?>
    </div>
</div>
<!--========================================================-->
<?php endif;?>
