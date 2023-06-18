  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        html,
        body {
          height: 100%;
        }

        .dropdown-menu .dropdown-item.sign-out {
            color: red;
        }


        body {
          display: flex;
          align-items: center;
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #f5f5f5;
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('images/sign-up.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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

        .footer {
      background-color: #f8f9fa;
      padding: 30px;
      text-align: center;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
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
    </style>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dogtorDB";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
   $userType = $_POST["userType"];
    print_r($userType);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $userType = $_POST["userType"];
      echo "User type: " . $userType;
  }
  
    if ($userType == 'vet') {
        $stmt = $conn->prepare("INSERT INTO vet (name, surname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $password);
    } elseif ($userType == 'patient') {
        $stmt = $conn->prepare("INSERT INTO patient (name, surname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $password);
    } else {
        die("Invalid user type!");
    }

    $stmt->execute();
    echo "New record created successfully";
    $stmt->close();
}

?>  
<?php include 'header.php'; ?>

    <main class="form text-center">
        <form action="" method="post"> 
            <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Surname" name="surname" required>
                <label for="floatingPassword">Surname</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" required>
                <label for="floatingPassword">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="container mb-3 form-check form-check-inline">
                <label>
                    <input type="radio" name="userType" value="vet" required> Vet
                </label>
                <label>
                    <input type="radio" name="userType" value="patient" required> Patient
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
        </form>
    </main>


    <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <p class="text-muted text-start">© 2023 DogtorAnytime</p>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
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

  <script src="js/bootstrap.bundle.min.js"></script>

