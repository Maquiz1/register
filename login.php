<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-5 mx-auto">
        <form action="post.process.php" method="POST">
        <h2>Login Here</h2>
            <div class="form-group">
                <label for="userName">username</label>
                <input type="text" name="userName" id="userName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passWord1">Password</label>
                <input type="password" name="passWord1" id="passWord1" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

</div>


<?php include('includes/footer.php'); ?>