<?php 
    session_start();
    if(!isset($_SESSION['isLoggedin'])){
        header("location: php/intro.php");
    }else{
        header("location: php/index.php");
    }
?>