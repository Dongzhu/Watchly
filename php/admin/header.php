<?php
session_start();
$pageTitle;
?>

<?php 
    if(isset($_SESSION['page-title'])){
        $pageTitle = $_SESSION['page-title'];
        unset($_SESSION['page-title']);
    }else{
        $pageTitle = 'Watchly - Movie, Online Movies, Series, Movie';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?=$pageTitle;?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="ufCPA4uYMFbXTc5H_tSqkzRto_lZ2SBJXXp_8JZP48Y" />
        <meta name="description" content="Watchly - Online Movies, Series and Shows Enjoy, Entertain and Chill with the newest online movies, series and shows in the world."/>
        <meta name="author" content="Watchly"/>
        <meta property="og:url" content="https://watchly.000webhostapp.com/"/>
        <meta property="og:site_name" content="Watchly"/>
        <meta property="og:title" content="<?=$pageTitle;?>"/>
        <meta property="og:description" content="Watchly - Online Movies, Series and Shows Enjoy, Entertain and Chill with the newest online movies, series and shows in the world."/>
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="../img/watchly.png"/>
        <meta property="og:locale" content="en_EG"/>
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:title" content="<?=$pageTitle;?>"/>
        <meta name="twitter:description" content="Watchly - Online Movies, Series and Shows Enjoy, Entertain and Chill with the newest online movies, series and shows in the world."/>
        <meta name="twitter:image" content="../img/watchly.png"/>
        <meta name="twitter:image:alt" content="Watchly"/>
	<link rel="icon" type="image/ico" href="../../img/favicon.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../../css/video-js.css" rel="stylesheet" type="text/css">
        <script src="../../js/videojs-ie8.min.js"></script>
        <link href="../../css/videojs-resolution-switcher.css" rel="stylesheet">
        <link href="../../css/netskin.css" rel="stylesheet">
        <link href="../../css/component.css" rel="stylesheet">
        <link href="../../css/watchly-style.css" rel="stylesheet">
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    </head>
    <body style="font-family: 'Roboto', cursive;">
        