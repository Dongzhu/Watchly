        <script src="../js/custom-file-input.js"></script>
        <!--Footer section -->
        <footer action="search.php" method="GET" class="container-fluid text-center">
            <?php if(isset($_SESSION['isLoggedin'])): ?>
            <a class="btn fg-orange" href="#myPage" title="To Top">
                <span class="fas fa-chevron-circle-up"></span>
                Scroll To Top
            </a>
            <br/><br/>
            <form action="search.php" method="POST" class="form-inline fg-orange" autocomplete="off">
                <input type="text" name="q" class="form-control" size="50" placeholder="Search eg. Iron man3" required>
                <input type="submit" value="Search" class="btn btn-orange" style="width: auto"/>
            </form>
            <?php endif;?>
            <br/>
            <p>Theme Made By <strong>
                <a class="fg-orange" href="https://www.linkedin.com/in/mostafa-mahmoud-abdelaleem/" target="_blank">
                    <span class="fab fa-linkedin"></span> Mostafa Mahmoud</a>
            </strong></p> 
            <p><strong>Copyright © 2018 Watchly - All Rights Reserved.</strong></p>
            <br/>
        </footer>
        <!--========================================================-->
        <script src="../js/video.js"></script>
        <script src="../js/videojs-resolution-switcher.js"></script>
        <script>
                videojs('video').videoJsResolutionSwitcher();
                function play() {
                  document.getElementById("play-btn").className = "carousel-control hidden";
                  videojs('video').ready(function() {
                  this.play();
                });
                }
        </script>
        <script src="../js/watchly-script.js"></script>
        <script src="../js/watchly-JS.js"></script>
    </body>
</html>