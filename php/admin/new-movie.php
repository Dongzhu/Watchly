<?php require_once 'header.php';?>
<form action="../process.php" method="POST" autocomplete="off">
    <h3 id="modal-header" class="modal-title fg-orange"><span class="fas fa-film"></span> Add New Movie</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5 class="fg-orange"><span class="fas fa-info-circle"></span> Basic Info:</h5>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="movName" placeholder="eg. IRON MAN3" required/>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input class="form-control" type="text" min="1950" max="2050" value="2018" name="movYear" required/>
                </div>
                <div class="form-group">
                    <label>Rate</label>
                    <input class="form-control" type="number" min="0" max="10" step=".1" value="5" name="movRate" required/>
                </div>
                <div class="form-group">
                    <label>Cover</label>
                    <input class="form-control" type="text" name="movCover" placeholder="eg. www.site.com/iron-man3-cover.jpg" required/>
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <input class="form-control" type="text" name="movPoster" placeholder="eg. www.site.com/iron-man3-poster.jpg" required/>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="fg-orange"><span class="fas fa-info"></span> Quality Links:</h5>
                <div class="form-group">
                    <label>1080p</label>
                    <input class="form-control" type="text" name="mov1080" placeholder="eg. www.site.com/iron-man3-1080p.mp4" required/>
                </div>
                <div class="form-group">
                    <label>720p</label>
                    <input class="form-control" type="text" name="mov720" placeholder="eg. www.site.com/iron-man3-720p.mp4" required/>
                </div>
                <div class="form-group">
                    <label>480p</label>
                    <input class="form-control"  type="text" name="mov480" placeholder="eg. www.site.com/iron-man3-480p.mp4" required/>
                </div>
                <div class="form-group">
                    <label>360p</label>
                    <input class="form-control" type="text" name="mov360" placeholder="eg. www.site.com/iron-man3-360p.mp4" required/>
                </div>
                <div class="form-group text-center">
                    <input class="btn btn-orange" type="submit" name="admin-movie-new" value="Add Movie" style="width: 50%"/>
                </div>
            </div>
        </div>
    </div>
</form>