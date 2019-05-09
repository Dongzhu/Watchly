<?php
    session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    unset($_SESSION['ID']);
    unset($_SESSION['userFirstname']);
    unset($_SESSION['userLastname']);
    unset($_SESSION['USERNAME']);
    unset($_SESSION['MAIL']);
    unset($_SESSION['MOBILE']);
    unset($_SESSION['Profile_Pic']);
    unset($_SESSION['isLoggedin']);
    unset($_SESSION['message']);
    unset($_SESSION['msg-type']);
    
    setcookie('KLUN', '', time() - (86400 * 7), "/"); // 86400 = 1 day
    setcookie('KLUNP', '', time() - (86400 * 7), "/"); // 86400 = 1 day
    
    session_unset();
    session_destroy();
    header("location: intro.php");
    
?>