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
      background-color: #fffefe;
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

    .pets-image {
      max-width: 80%;
      height: 80%;
      padding: 30px;
    }

    .text-center {
      text-align: center;
    }

    To move the alert further away from the header, you can add some margin to the top of the alert element. Here's an updated version of the contactus.php file with the alert positioned below the header:

php

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .main-section {
      background-color: #fffefe;
      min-height: calc(100vh - 56px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pets-image {
      max-width: 80%;
      height: 80%;
      padding: 30px;
    }

    .text-center {
      text-align: center;
    }

    .alert {
      margin-top: 20px;
    }
  </style>
</head>
<body class="bs-body-color-255,255,255">
<?php include 'header.php'; ?>

  <main class="my-5 main-section">
    <div class="container">

    <?php
      $status = $_GET['status'] ?? '';

      if ($status === 'success') {
          echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Thank you for your message. We will get back to you soon.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
      elseif ($status === 'error') {
        echo '
        <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
          Sorry, there was a problem sending your message. Please try again later.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      ?>

      <div class="row">
          <div class="col">
              <div class="py-5 text-center">
                  <h2>Let's get in touch!</h2>
                  <p> Fill the form below and our team will promptly get back to you and provide the assistance you need.
                  We look forward to hearing from you and ensuring that your experience with DogtorAnytime is exceptional!
                  </p>
                </div>
          </div>
      </div>
      <form action="Database/send_email.php" method="post">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message"></textarea>
        </div>
        <div class="d-flex justify-content-center mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

      <div class="row">
        <div class="col text-center">
          <img src="images/pets3.jpeg" alt="pets" class="img-fluid pets-image" />
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
