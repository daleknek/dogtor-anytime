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
                <h2>Sign Up</h2>
            </div>
            <form action="/signup" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Surname" name="surname" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group form-check col-md-5 text-center">
                        <input type="radio" class="form-check-input" id="checkPatient" name="UserType"value="Patient">
                        <label class="form-check-label" for="checkPatient">Patient</label>
                    </div>
                    <div class="form-group form-check col-md-5 text-center">
                        <input type="radio" class="form-check-input" id="checkVet" name="UserType" value="Vet">
                        <label class="form-check-label" for="checkVet">Vet</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </form>
        </div>
    </div>
</div>

