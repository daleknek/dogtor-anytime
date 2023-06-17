<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .dropdown-menu .dropdown-item.sign-out {
            color: red;
        }

        .main-section {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('images/pets.jpg');
            background-size: cover;
            background-position: center bottom;
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

        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
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
</head>
<body>
<?php include 'header.php'; ?>

<div class="content">
    <main class="main-section">
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
                <!-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> -->
                <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <p class="text-muted text-start">© 2023 DogtorAnytime</p>
                </div>
                <div
                        class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
                    <a href="/" class="link-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                </div>
                <div class="col-md-4">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="aboutUs" class="nav-link px-2 text-muted">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="contactUs" class="nav-link px-2 text-muted">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>