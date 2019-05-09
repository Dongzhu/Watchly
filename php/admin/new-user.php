<?php require_once 'header.php';?>
<form action="../process.php" method="POST" autocomplete="off">
    <h3 class="fg-orange"><span class="fas fa-user-plus"></span> Add New User</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5 class="fg-orange"><span class="fas fa-info-circle"></span> Basic Info:</h5>
                <div class="form-group">
                    <label>Firstname</label>
                    <input class="form-control" type="text" name="firstname" placeholder="eg. Jone"/>
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input class="form-control" type="text" name="lastname" placeholder=" eg. Doe"/>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" placeholder="eg. jone@mail.com"/>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" type="date" name="age"/>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="fg-orange"><span class="fas fa-info"></span> Required Info:</h5>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Must be unique" required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <input id="pwd" class="form-control" type="password" name="password" placeholder="At least 8 characters" required/>
                        <i class="input-group-addon" onclick="pwdToggle()" style="cursor: pointer"><span id="pwdIcon" class="fas fa-eye"></span></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                        <option value="User" selected>User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-orange" type="submit" name="admin-user-Reg" style="width: 50%">Create User</button>
                </div>
            </div>
        </div>
    </div>
</form>