<?php session_start();?>

<?php require_once 'header.php';?>
<?php require_once 'cp-navbar.php';?>
<?php require_once '../alert.php';?>

<div class="container-fluid">    

    <div class="row" style="padding-top: 40px;padding-bottom: 40px">
        <div class="col-sm-2" style="border-right: 1px solid #ddd">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?php if(!isset($_GET['tab']) || $_GET['tab']==='dash'){echo'active';} ?>">
                    <a data-toggle="tab" href="#dashboardTab">
                        <span class="fas fa-tachometer-alt"></span> Dashboard
                    </a>
                </li>
                <li class="<?php if($_GET['tab']==='users'){echo'active';} ?>">
                    <a data-toggle="tab" href="#usersTab">
                        <span class="fas fa-users"></span> Users Management
                    </a>
                </li>
                <li class="<?php if($_GET['tab']==='new-user'){echo'active';} ?>">
                    <a data-toggle="tab" href="#newUserTab">
                        <span class="fas fa-user-plus"></span> Add New User
                    </a>
                </li>
                <li class="<?php if($_GET['tab']==='movies'){echo'active';} ?>">
                    <a data-toggle="tab" href="#moviesTab">
                        <span class="fas fa-film"></span> Movies Management
                    </a>
                </li>
                <li class="<?php if($_GET['tab']==='new-movie'){echo'active';} ?>">
                    <a data-toggle="tab" href="#newMovieTab">
                        <span class="fas fa-plus"></span> Add New Movie
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="tab-content">
                <div id="dashboardTab" class="tab-pane fade <?php if(!isset($_GET['tab']) || $_GET['tab']==='dash'){echo'in active';} ?>">
                    
                </div>
                <div id="usersTab" class="tab-pane fade <?php if($_GET['tab']==='users'){echo'in active';} ?>">
                    <?php require_once './user-management.php';?>
                </div>
                <div id="newUserTab" class="tab-pane fade <?php if($_GET['tab']==='new-user'){echo'in active';} ?>">
                    <?php require_once './new-user.php';?>
                </div>
                <div id="moviesTab" class="tab-pane fade <?php if($_GET['tab']==='movies'){echo'in active';} ?>">
                    <?php require_once './movie-management.php';?>
                </div>
                <div id="newMovieTab" class="tab-pane fade <?php if($_GET['tab']==='new-movie'){echo'in active';} ?>">
                    <?php require_once './new-movie.php';?>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function loadDashboard() {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("dashboardTab").innerHTML=this.responseText;
          }
        }
        xmlhttp.open("GET","dashboard.php");
        xmlhttp.send();
    };
    loadDashboard();
    setInterval(loadDashboard, 1000);
</script>

<?php require_once 'footer.php';?>