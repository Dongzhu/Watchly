<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET['p'])){
    if($_GET['p'] === 'home'){
        $_SESSION['currentPage'] = $_GET['p'];
        header("location: ../index.php");
    }
    elseif($_GET['p'] === 'most-viewed'){
        $_SESSION['currentPage'] = $_GET['p'];
        $_SESSION['page-title'] = 'Watchly - Most Viewed';
        header("location: ../most-viewed.php");
    }
    elseif($_GET['p'] === 'top-rated'){
        $_SESSION['currentPage'] = $_GET['p'];
        $_SESSION['page-title'] = 'Watchly - Top Rated';
        header("location: ../top-rated.php");
    }
    elseif($_GET['p'] === 'categories'){
        $_SESSION['currentPage'] = $_GET['p'];
        $_SESSION['page-title'] = 'Watchly - Categories';
        header("location: ../categories.php");
    }
    elseif($_GET['p'] === 'profile'){
        $_SESSION['currentPage'] = $_GET['p'];
        $_SESSION['page-title'] = 'Watchly - '.$_SESSION['userArray']['username'];
        header("location: ../profile.php");
    }
    elseif($_GET['p'] === 'video'){
        $_SESSION['currentPage'] = $_GET['p'];
        $_SESSION['v'] = $_GET['v'];
        $_SESSION['page-title'] = 'Watchly - '.$_GET['vn'];
        header("location: ../video.php");
    }
    elseif($_GET['p'] === 'user-management'){
        $_SESSION['currentPage'] = 'control-panel';
        header("location: ../admin/?tab=users");
    }
    elseif($_GET['p'] === 'movie-management'){
        $_SESSION['currentPage'] = 'control-panel';
        header("location: ../admin/?tab=movies");
    }
    elseif($_GET['p'] === 'control-panel'){
        $_SESSION['currentPage'] = $_GET['p'];
        $_SESSION['page-title'] = 'Watchly - CPanel';
        header("location: ../admin/");
    }
    elseif($_GET['p'] === 'login'){
        $_SESSION['page-title'] = 'Watchly - Login';
        header("location: ../login.php");
    }
    elseif($_GET['p'] === 'reg'){
        $_SESSION['page-title'] = 'Watchly - Create Account';
        header("location: ../reg.php");
    }
    else{
        $_SESSION['currentPage'] = 'home';
        header("location: ../index.php");
    }
}