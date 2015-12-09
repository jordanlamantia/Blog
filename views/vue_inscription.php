<?php include_once "layout/header.php" ?>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Page inscription</h1></br>
            <form method="post" action="" class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="text-left" for="email">Email</label>
                    <input name="user_email" class="form-control" type="text" required>
                </div>
                <div class="form-group">
                    <label class="text-left" for="login">Login</label>
                    <input name="user_login" class="form-control" type="text" required>
                </div>
                <div class="form-group">
                    <label class="text-left" for="password">Password</label>
                    <input name="user_password" class="form-control" type="password" required>
                </div>
                <div class="form-group">
                    <label class="text-left" for="password">Repeat password</label>
                    <input name="user_password" class="form-control" type="password" required>
                </div>
                <div class="form-group text-center">
                    <br>
                    <button class="btn btn-primary" type="submit">Inscription</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "layout/footer.php" ?>
