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

  <?php include 'header.php'; ?>

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
            Welcome to DogtorAnytime, your go-to destination for finding the perfect veterinarian for your beloved pet in Athens! We understand that your furry friends deserve the best care, and that's why we're here to help.</p>
            <p>Booking and managing your pet's appointment with a veterinarian through our web app is a breeze. We have designed our platform to make the appointment booking process as easy and convenient as possible </p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-6">
            <p class="mt-4"> Simply visit our user-friendly web app, search for veterinarians in Athens based on your pet's needs, explore detailed vet profiles, and select an appointment time that works best for you and your pet's schedule. </p>

            <p> With DogtorAnytime, finding the right veterinarian and booking their services has never been easier!</p>
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
