
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
require 'Config/dbConnect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $userType = $_POST["userType"];
    $userId = "";
  
    if ($userType == 'vet') {
        $stmt = $conn->prepare("INSERT INTO vet (name, surname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $password);
        $stmt->execute();
        $userId = $conn->insert_id;
        // Perform select operation to get the vetId
        $selectStmt = $conn->prepare("SELECT vetId FROM vet WHERE vetId = ?");
        $selectStmt->bind_param("i", $userId);
    } elseif ($userType == 'patient') {
        $stmt = $conn->prepare("INSERT INTO patient (name, surname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $password);
        $stmt->execute();
        $userId = $conn->insert_id;
        // Perform select operation to get the patientId
        $selectStmt = $conn->prepare("SELECT patientId FROM patient WHERE patientId = ?");
        $selectStmt->bind_param("i", $userId);
    } else {
        die("Invalid user type!");
    }

    $selectStmt->execute();
    $result = $selectStmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $userType == 'vet' ? $row["vetId"] : $row["patientId"];
            header("Location: /dogtor-anytime/homepage");
        }
    }

    $stmt->close();
    $selectStmt->close();
}

?>  

<script>
    const redirectToHomePage = () => {
        console.log('submit');
        window.location.href = '/dogtor-anytime/homepage';
    } 

</script>

<?php include 'header.php'; ?>

    <main class="main-section">
    <div class="container form text-center">
        <form id="signUpForm" action="" method="post">     
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
