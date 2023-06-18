

    <style>

<<<<<<< HEAD
        body {
            background-image: url("images/cal2.jpg");
            padding-top: 80px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

=======
>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95
        .card-text {
            margin-bottom: 0.50rem;  
        }

        .card-title {
            margin-bottom: 0.50rem; 
        }

<<<<<<< HEAD
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


<body>
<?php include 'header.php'; ?>
=======
        .main-section {

        min-height: calc(100vh - 56px); /* Subtracting the header and footer height */
        display: flex;
        align-items: center;
        justify-content: center;

      }  
    </style>


<?php include 'header.php';?>
>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95

    <main class='main-section'>
    <div class='container py-5'>
        <h1 class='text-center mb-4'>My Appointments</h1>
        <div id='alerts-container'></div>
        <?php
              
          if(count($result) > 0){
            for($i = 0; $i < count($result); $i++) {
              $appointmentId = $result[$i]['appointmentId'];
              $vetId = $result[$i]['vet'][0]['vetId'];
              $vetName = $result[$i]['vet'][0]['name'];
              $vetSurname = $result[$i]['vet'][0]['surname'];
              $date = $result[$i]['appointmentDate'];
              $time = $result[$i]['appointmentTime'];
              echo "<div class='card mb-3' data-appointment-id='$appointmentId' data-vet-id='$vetId'>
                    <div class='card-body'>
                      <h5 class='card-title'>Vet: $vetName $vetSurname</h5>
                      <p class='card-text'>Date: $date</p>
                      <p class='card-text'>Time: $time</p>                  
                      <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editAppointmentModal' onclick='getAppointmentId($appointmentId)'>Edit</button>
                      <button class='btn btn-danger' onclick='deleteAppointment($appointmentId)'>Delete</button>
                    </div>
                  </div>";          
            }
           }else{
              echo"<div class='alert alert-info' role='alert'>
                No appointments were found!
              </div>";
            }
          ?>
    </div>
   
<div class='modal fade' id='editAppointmentModal' tabindex='-1' aria-labelledby='editAppointmentModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editAppointmentModalLabel'>Edit Appointment</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form id='editAppointmentForm'  action="/AppointmentsController.php" onsubmit='event.preventDefault();'>
          <div class='mb-3'>
            <label for='date' class='form-label'>New Date</label>
            <input type='date' name="date" class='form-control' id='date'>
          </div>
          <div class='mb-3'>
            <label for='date' class='form-label'>New Time</label>
            <input type='time' name="time" class='form-control' id='time'>
          </div>
          <input type='hidden' id='appointmentId'>
          <button type='submit' class='btn btn-primary' onclick='editAppointment();'>Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<<<<<<< HEAD

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
   
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>
=======
          </main>
<?php include 'footer.php';?>  

>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95
<script>

    const getAppointmentId = (id) => {
      console.log('appointmentId', id);
      document.getElementById('appointmentId').value = id;
    };

    const editAppointment = () => {
        const appointmentId = document.getElementById('appointmentId').value;
        const form = document.getElementById('editAppointmentForm');
        const formData = new FormData(form);
        const date = formData.get('date');
        const time = formData.get('time');

        formData.set('appointmentId', appointmentId)
        formData.set('task', 'update');


        fetch('', {
            method: 'POST',
            body: formData,
            task: 'update'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const editAppointmentModal = document.getElementById('editAppointmentModal');
            const modal = bootstrap.Modal.getInstance(editAppointmentModal);
            modal.hide();
            const alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.textContent = 'The appointment was updated! Please reload the page to see your appointments!';
            document.getElementById('alerts-container').appendChild(alert);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
            const alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            alert.textContent = 'There was a problem updating the appointment: ' + error;
            document.getElementById('alerts-container').appendChild(alert);
        });
    };
    
    const deleteAppointment = (id) => {
        event.preventDefault();

        const formData = new FormData();

        formData.set('appointmentId', id)
        formData.set('task', 'delete');

        fetch('', {
            method: 'POST',
            body: formData,

        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.textContent = 'The appoointment was deleted! Please refresh the page!';
            document.getElementById('alerts-container').appendChild(alert);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
            const alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            alert.textContent = 'There was a problem deleting the appointment: ' + error;
            document.getElementById('alerts-container').appendChild(alert);
        });
    };
</script>
  </body>

