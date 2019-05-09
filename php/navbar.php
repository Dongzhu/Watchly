<!-- Navbar section -->
<nav id="myPage" class="navbar navbar-inverse navbar-expand-sm">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="page.php/?p=home" style="font-family: 'Pacifico', cursive;">Watchly<span class="fas fa-play sm-logo"></span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="<?php if($_SESSION['currentPage']==='home'){echo'active';} ?>"><a href="page.php/?p=home"><span class="fas fa-home"></span> Home</a></li>
                <li class="<?php if($_SESSION['currentPage']==='most-viewed'){echo'active';} ?>"><a href="page.php/?p=most-viewed"><span class="fas fa-chart-line"></span> Most viewed</a></li>
                <li class="<?php if($_SESSION['currentPage']==='top-rated'){echo'active';} ?>"><a href="page.php/?p=top-rated"><span class="fas fa-star"></span> Top Rated</a></li>
                <?php if($_SESSION['userArray']['userType']==='Admin'):?>
                <li class="<?php if($_SESSION['currentPage']==='control-panel'){echo'active';} ?>"><a href="page.php/?p=control-panel"><span class="fab fa-cpanel"></span> CPanel</a></li>
                <?php endif;?>
            </ul>
            <?php if(isset($_SESSION['isLoggedin'])):?>
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if($_SESSION['currentPage']==='profile'){echo'active';} ?>"><a href="page.php/?p=profile" style="padding: 12px 5px 8px 5px;"><img src="<?=$_SESSION['userArray']['userPic'];?>" class="img-responsive img-circle" style="width:30px; height: 30px; display: inline"> <?php echo $_SESSION['userArray']['username'];?></a></li>
                <li><a href="logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
            </ul>
            <?php endif;?>
        </div>
    </div>
</nav>
<!--========================================================-->
