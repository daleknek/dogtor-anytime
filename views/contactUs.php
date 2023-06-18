
  <style>
    .dropdown-menu .dropdown-item.sign-out {
      color: red;
    }

    .main-section {
      background-color: #fffefe;
      min-height: calc(100vh - 56px); /* Subtracting the header height */
      display: flex;
      justify-content: center fixed;
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
<?php include 'header.php';?>
  <main class="my-5 main-section bs-body-color-255,255,255">
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
<?php include 'footer.php'?>


