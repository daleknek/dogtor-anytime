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
        background: url("images/bg_aboutus.webp") center center;
        min-height: calc(100vh - 56px); /* Subtracting the header height */
        display: flex;
        justify-content: center;
        align-items: center;
    }

      .main-image {
        max-width: 80%; /* Set the maximum width */
        height: auto; /* Maintain aspect ratio */
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
    </style>
  </head>
  <body>
    <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">DogtorAnytime</a>
          <div
            class="collapse navbar-collapse justify-content-end"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="https://github.com/mdo.png"
                    alt="Profile Picture"
                    width="32"
                    height="32"
                    class="rounded-circle"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="navbarDropdown"
                >
                  <li><a class="dropdown-item" href="editProfile">My Profile</a></li>
                  <li><a class="dropdown-item" href="#">My Appointments</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item sign-out" href="landingPageLoggedOut">Sign out</a>
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
        <div class="row">
          <div class="col-md-6">
            <img
              src="images/aboutus.webp"
              alt="photo-dog"
              class="img-fluid main-image"
            />
          </div>
          <div class="col-md-6">
            <h1>About Us</h1>
            <p class="mt-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Accusamus eum iure possimus distinctio repellendus nostrum
              quisquam perferendis est ex vitae odio et dolorem pariatur eius,
              adipisci fugit, quae hic ipsa?
            </p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-6">
            <p class="mt-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Accusamus eum iure possimus distinctio repellendus nostrum
              quisquam perferendis est ex vitae odio et dolorem pariatur eius,
              adipisci fugit, quae hic ipsa?
            </p>
          </div>
          <div class="col-md-6">
            <img
              src="images/pets2.jpg"
              alt="photo-dog"
              class="img-fluid main-image"
            />
          </div>
        </div>
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
  </body>
</html>
