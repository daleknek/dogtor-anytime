
    <style>

        .dropdown-menu .dropdown-item.sign-out {
            color: red;
        }


        .main-section {
            min-height: calc(100vh - 56px);
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $userType = $_POST["userType"];
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

    <main class="main-section">
    <div class="container form text-center">
        <form submit='event.preventDefault();' id="signUpForm" action="" method="post"> 
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
</div>
    </main>
<?php include 'footer.php';?>
