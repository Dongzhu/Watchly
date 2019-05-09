<?php require 'header.php';?>
<?php 
    if(isset($_SESSION['isLoggedin'])){
        header("location: index.php");
    }
?>
<?php require_once 'jumbotron.php';?>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<?php require_once 'footer.php';?>