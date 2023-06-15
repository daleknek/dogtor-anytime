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
        background: url("images/bg_profile.webp") center center;
        min-height: calc(100vh - 56px); /* Subtracting the header height */
        display: flex;
        justify-content: center;
        align-items: center;
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
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
    }

    </style>
  </head>
  <body class="bs-body-color-255,255,255">
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
                  <li><a class="dropdown-item" href="#">My Profile</a></li>
                  <li><a class="dropdown-item" href="#">My Appointments</a></li>
                  <li><hr class="dropdown-divider" /></li>
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
        <h1>My Profile</h1>
        <hr>
      <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="images/profile1.jpg"  class="rounded-circle img-circle mb-3" alt="avatar">
              <h6>Upload a different photo:/h6>
              
              <input type="file" class="form-control">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <h3>Personal info</h3>
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-lg-3 control-label">First Name</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="John">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Last Name</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="Doe">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="johndoe@mail.com">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Username</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" value="jdoe">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Password</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" value="11111122333">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <div class="buttons">
                        <input type="button" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-outline-primary" value="Cancel">
                    </div>
                    </div>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    <hr>
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
                  <a href="#" class="nav-link px-2 text-muted">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link px-2 text-muted">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
