<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .dropdown-menu .dropdown-item.sign-out {
      color: red;
    }

    .main-section {
      background-color: #E5E4E2;
      min-height: calc(100vh - 56px); /* Subtracting the header height */
      display: flex;
      justify-content: center;
      align-items: center;
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

    .card {
      margin: 5% 0%;
    }

    .card-body {
      margin: 0% 0% 0% 3%;
      padding: 6% 0%;
    }

    .input-group {
      max-width: 300px; /* Adjust the width as needed */
      margin: 0 auto; /* Center the search bar */
    }

    .custom-card-img {
      max-height: 200px; /* Adjust the height as needed */
      object-fit: cover;
    }

    .pagination {
      justify-content: center; /* Center the pagination */
    }
  </style>
</head>

<body class="bs-body-color-255,255,255">
  
<?php include 'header.php'; ?>

  <main class="my-5 main-section">
    <div class="container">

      <div class="input-group">
        <input id= "search_text" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
          aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary" onclick="search_func()">Search</button>
      </div>

      <!-- Card deck -->
      <div class="card-deck row">
        <?php
      require 'Config/dbConnect.php';

      if (isset($_GET['search'])) {
        $search = $_GET['search'];

      // Prepare a SQL statement to search for matching veterinarians
      $stmt = $conn->prepare("SELECT * FROM vet WHERE name LIKE ? OR surname LIKE ?");
      $stmt->bind_param("ss", $searchPattern, $searchPattern);
      $searchPattern = "%$search%";
      $stmt->execute();

      // Fetch all matching veterinarians as an associative array
      $veterinarians = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

      // Loop through the results and generate HTML output
      foreach ($veterinarians as $vet) {
        $vetId = $vet['vetId'];
        $clinic = $vet['clinic'];
        $name = $vet['name'];
        $surname = $vet['surname'];
        $email = $vet['email'];
        $aboutUs = $vet['aboutUs'];

    // Generate HTML output for each veterinarian
    $html = <<<HTML
    <div class="col-xs-12 col-sm-6 col-md-4">
      <!-- Card -->
      <div class="card">
        <!--Card image-->
        <div class="view overlay">
          <img class="card-img-top custom-card-img" src="path_to_image/$vetId.jpg" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!--Card content-->
        <div class="card-body">
          <!--Title-->
          <h4 class="card-title">$name $surname</h4>
          <!--Text-->
          <p class="card-text">Clinic: $clinic</p>
          <p class="card-text">Email: $email</p>
          <p class="card-text">About: $aboutUs</p>
          <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
          <button type="button" class="btn btn-primary">Read more</button>
        </div>
      </div>
      <!-- Card -->
    </div>
    HTML;

    echo $html;
  }
}
?>

      </div>
      <!-- Card deck -->

      <!-- <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav> -->

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

  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
  function search_func() {
    console.log('asdasdasd')
    let val = document.getElementById('search_text').value;
    window.location.href = window.location.pathname + '?search=' + encodeURIComponent(val);

  }
  </script>

</body>

</html>
