
<style>
    .dropdown-menu .dropdown-item.sign-out {
        color: red;
    }

    .main-section {
        min-height: calc(100vh - 56px);
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('images/pets.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .buttons {
        text-align: center;
    }

    .rounded-circle.img-circle {
        width: 150px;
        height: 150px;
        object-fit: cover;
        object-position: center;
    }

    .form {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form .checkbox {
        font-weight: 400;
    }

    .form .form-floating:focus-within {
        z-index: 2;
    }

    .form input[type="email"],
    .form input[type="password"],
    .form input[type="text"] {
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .content {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
</style>

<?php include 'header.php'; ?>
<main class="main-section">
    <div class="container form text-center">
        <div class="form text-center">
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <div class="alert alert-danger" role="alert">
                Invalid email or password!
            </div>
        <?php endif; ?>
        <form action="Database/authenticate.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
        </form>
    </div>
</div>
</main>
<?php include 'footer.php'; ?>