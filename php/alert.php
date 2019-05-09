<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg-type']?> alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif;?>