

    <style>

        body {
            background-color: #f2f2f2;
            padding-top: 80px;
        }

        .card-text {
            margin-bottom: 0.50rem;  
        }

        .card-title {
            margin-bottom: 0.50rem; 
        }

        .navbar {
          padding-top: 10px;
        }
    </style>


<nav class='navbar fixed-top navbar-light bg-light'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>Dogtor Anytime</a>
        </div>
    </nav>
    <div class='container py-5' id='alertsContainer'>

    </div>
    <div class='container py-5'>
        <h1 class='text-center'>My Appointments</h1>
        <?php
          foreach ($result as $appointment) {
            $vetName = $appointment['vet'][0]['name'];
            $vetSurname = $appointment['vet'][0]['surname'];
            $date = $appointment['date'];
            $time = $appointment['time'];
          echo "<div class='card mb-3' data-appointment-id='1'>
                <div class='card-body'>
                  <h5 class='card-title'>Vet: $vetName</h5>
                  <p class='card-text'>Date: $date</p>
                  <p class='card-text'>Time: $time</p>                  
                  <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editAppointmentModal' 
                  onclick='document.getElementById('appointmentId').value = this.parentElement.parentElement.dataset.appointmentId'>Edit</button>
                  <button class='btn btn-danger' onclick='deleteAppointment(this.parentElement.parentElement.dataset.appointmentId)'>Delete</button>
                </div>
              </div>";          
          }
          ?>
        <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#addAppointmentModal'>Add Appointment</button>
    </div>

<div class='modal fade' id='addAppointmentModal' tabindex='-1' aria-labelledby='addAppointmentModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='addAppointmentModalLabel'>Add Appointment</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form id='addAppointmentForm' onsubmit='event.preventDefault(); addAppointment();'>
          <div class='mb-3'>
            <label for='vetSelect' class='form-label'>Select Vet</label>
            <select class='form-select' id='vetSelect'>
              <option selected>Choose...</option>
              <option value='1'>Dr. Smith</option>
              <option value='2'>Dr. Gillan</option>

            </select>
          </div>
          <div class='mb-3'>
            <label for='addDate' class='form-label'>Date</label>
            <input type='date' class='form-control' id='addDate'>
          </div>
          <div class='mb-3'>
            <label for='addTime' class='form-label'>Time</label>
            <input type='time' class='form-control' id='addTime'>
          </div>
          <button type='submit' class='btn btn-primary'>Add Appointment</button>
        </form>
      </div>
    </div>
  </div>
</div>
   
<div class='modal fade' id='editAppointmentModal' tabindex='-1' aria-labelledby='editAppointmentModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editAppointmentModalLabel'>Edit Appointment</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form id='editAppointmentForm'>
          <div class='mb-3'>
            <label for='newDate' class='form-label'>New Date</label>
            <input type='date' class='form-control' id='newDate'>
          </div>
          <div class='mb-3'>
            <label for='newTime' class='form-label'>New Time</label>
            <input type='time' class='form-control' id='newTime'>
          </div>
          <input type='hidden' id='appointmentId'>
          <button type='submit' class='btn btn-primary'>Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
   
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz' crossorigin='anonymous'></script>
<script>
    function addAppointment() {

        var vetId = document.getElementById('vetSelect').value;
        var date = document.getElementById('addDate').value;
        var time = document.getElementById('addTime').value;

        var formData = new FormData();
        formData.append('vetId', vetId);
        formData.append('date', date);
        formData.append('time', time);
        formData.append('task', 'create');

        fetch('AppointmentQueries.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            var alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.textContent = 'Appointment added successfully: ' + data;
            document.getElementById('alertsContainer').appendChild(alert);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
            var alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            alert.textContent = 'There was a problem adding the appointment: ' + error;
            document.getElementById('alertsContainer').appendChild(alert);
        });
    }

    function editAppointment(appointmentId, newDate, newTime) {
    
        var formData = new FormData();
        formData.append('id', appointmentId);
        formData.append('date', newDate);
        formData.append('time', newTime);
        formData.append('task', 'edit');

        fetch('AppointmentQueries.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            var alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.textContent = 'Appointment updated successfully: ' + data;
            document.getElementById('alertsContainer').appendChild(alert);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
            var alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            alert.textContent = 'There was a problem updating the appointment: ' + error;
            document.getElementById('alertsContainer').appendChild(alert);
    });}
    
    function deleteAppointment(appointmentId) {
        var formData = new FormData();
        formData.append('id', appointmentId);
        formData.append('task', 'delete');

        fetch('AppointmentQueries.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            var alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.textContent = 'Appointment deleted successfully: ' + data;
            document.getElementById('alertsContainer').appendChild(alert);

            // Removes the deleted appointment card from the DOM
            var appointmentCard = document.querySelector('[data-appointment-id='' + appointmentId + '']');
            appointmentCard.parentNode.removeChild(appointmentCard);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
            var alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            alert.textContent = 'There was a problem deleting the appointment: ' + error;
            document.getElementById('alertsContainer').appendChild(alert);
    });
    }
</script>

