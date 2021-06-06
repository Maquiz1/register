<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-5 mx-auto">
        <form action="post.process.php" method="POST">
        <h2>Register Here</h2>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="userName">username</label>
                <input type="text" name="userName" id="userName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passWord1">Password</label>
                <input type="password" name="passWord1" id="passWord1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passWord2">Confirm Password</label>
                <input type="password" name="passWord2" id="passWord2" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

</div>


<?php include('includes/footer.php'); ?>