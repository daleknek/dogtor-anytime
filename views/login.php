<div class="d-flex justify-content-end fixed-top m-2">
    <a href="http://localhost/dogtor-anytime/index.php?controller=login" class="btn btn-primary ml-2">Login</a>
    <a href="http://localhost/dogtor-anytime/index.php?controller=signup" class="btn btn-primary ml-2">Sign Up</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-4">
            <img src="images/logo-no-background.png" alt="Logo" class="logo">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-4">
                <h2>Login</h2>
            </div>
            <form action="/login" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="uname" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="psw" required>
                </div>
                <div class="text-left mt-3">
                    <a href="#" class="forgot-password-link">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
