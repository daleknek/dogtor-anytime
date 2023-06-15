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
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">DogtorAnytime</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="Profile Picture" width="32" height="32"
                  class="rounded-circle" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">My Profile</a></li>
                <li><a class="dropdown-item" href="#">My Appointments</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item sign-out" href="#">Sign out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="my-5 main-section">
    <div class="container">

      <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
          aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary">Search</button>
      </div>

      <!-- Card deck -->
      <div class="card-deck row">

        <div class="col-xs-12 col-sm-6 col-md-4">
          <!-- Card -->
          <div class="card">

            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top custom-card-img" src="images/vet1.jpg" alt="Vet1">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body">

              <!--Title-->
              <h4 class="card-title">Dr. Vet</h4>
              <!--Text-->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-primary">Read more</button>

            </div>

          </div>
          <!-- Card -->
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
          <!-- Card -->
          <div class="card mb-4">

            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top custom-card-img" src="images/vet2.jpg" alt="Vet2">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body">

              <!--Title-->
              <h4 class="card-title">Jane Doe</h4>
              <!--Text-->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-primary">Read more</button>

            </div>

          </div>
          <!-- Card -->
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
          <!-- Card -->
          <div class="card">

            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top custom-card-img" src="images/vet3.jpg" alt="Vet3">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body">

              <!--Title-->
              <h4 class="card-title">Dr. Birdy</h4>
              <!--Text-->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-primary">Read more</button>

            </div>

          </div>
          <!-- Card -->
        </div>

      </div>
      <!-- Card deck -->

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>

    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <span class="text-muted">© 2023 DogtorAnytime. All rights reserved.</span>
    </div>
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
