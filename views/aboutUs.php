
    <style>
      body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
      }

      .dropdown-menu .dropdown-item.sign-out {
        color: red;
      }

      main {
        margin: 0;
    }
    .first-row {
        margin-top: 50px; /* Adjust the value as desired */
    }
      .main-section {
      background-image: url("images/bg_aboutus.webp");
      background-position: center 30%; /* Adjust the percentage to control the vertical position */
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      min-height: calc(100vh - 56px); /* Subtracting the header and footer height */
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

    <main class="main-section">
      <div class="container">
        <div class="row first-row">
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

 <?php include 'footer.php';?>
