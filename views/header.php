<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'Config/dbConnect.php';

$user_logged_in = isset($_SESSION['id']);

if ($user_logged_in) {
    $patientId = $_SESSION['id'];

    $sql = "SELECT name, avatar FROM patient WHERE patientId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_name, $user_avatar_blob);
    $stmt->fetch();

    $user_avatar_base64 = base64_encode($user_avatar_blob);

    $stmt->close();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: homepage"); 
    exit();
}

$conn->close();
?>

<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="homepage">DogtorAnytime</a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php if ($user_logged_in): ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="data:image/png;base64,<?php echo $user_avatar_base64; ?>" alt="Profile Picture" width="32" height="32" class="rounded-circle">
              <?php echo $user_name; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="myprofile">My Profile</a></li>
              <li><a class="dropdown-item" href="#">My Appointments</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item sign-out" href="?logout=true">Sign out</a></li>
            </ul>
          </li>
        </ul>
        <?php else: ?>
        <div class="col-md-3 text-end">
          <a href="login" class="btn btn-outline-primary me-2">Login</a>
          <a href="signup" class="btn btn-outline-primary me-2">Sign-up</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>