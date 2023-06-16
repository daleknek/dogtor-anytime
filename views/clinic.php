<!doctype html>
<html>
<head>

<?php
require 'Config/dbConnect.php';

$vetId = intval($_GET['vetId']);

$result = $conn->query("SELECT * FROM vet WHERE vetId = $vetId");

// check the vet is found
if ($result->num_rows > 0) {

    // gets the first vet
    $vet = $result->fetch_assoc();
} else {

    echo "No vet found with ID $vetId";
}

$conn->close();
?>


</head>
<style>
    .clinic-photo {

        width: 250px; 
        height: 250px; 
        border-radius: 50%; 
        object-fit: cover; 
    }

    body {
        padding-top: 120px;
        margin-left: 40px;
    }

    .custom-bg {
        background-color: #f2f2f2;
    }

    .navbar {
        padding-top: 10px;
    }

    .row {
        margin-top: 40px;
    }
</style>
    <nav class="navbar fixed-top navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Dogtor Anytime</a>
        </div>
    </nav>
    <body class="custom-bg"> 
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4"> 
                        <img src="images/clinicphoto.jpg" class="clinic-photo" alt="clinicphoto">
                    </div>
                    <div class="col-md-8"> 
                        <p class="h2"><?php echo $vet['name'];?></p> <!-- changes dynamically -->
                        <dl class="row">
                            <dt class="col-sm-3">Address</dt>
                            <dd class="col-sm-9"><?php echo $vet['address'];?></dd> <!-- changes dynamically -->
                            <dt class="col-sm-3">Contact</dt>
                            <dd class="col-sm-9">
                              <p><?php echo $vet['phone'];?></p> <!-- changes dynamically -->
                            </dd>
                            <dt class="col-sm-3">Hours</dt>
                            <dd class="col-sm-9"><?php echo $vet['hours'];?></dd> <!-- changes dynamically -->
                        </dl>
                    </div>
                </div>
                <br> 
            <div class="aboutme">
                <p class="h5 text-muted">About Us</p>
                <p><?php echo $vet['aboutUs']; ?></p> <!-- changes dynamically -->
                <p class="h6 text-muted">Specialization:
                    <ul>
                      <li>Lorem</li>
                      <li>Ipsum</li>
                      <li>Dolor</li>
                    </ul>
                </p>
            </div>
        </div>
        <div class="col-md-4" id="calendar"> 
            <!-- Placeholder for calendar -->
        </div>
    </div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek', // show a weekly view initially
        selectable: true, // allows user to select time slots
        select: function(info) { // called when user selects a time slot
            // store selected date and time in local storage
            localStorage.setItem('selectedDate', info.startStr);
            localStorage.setItem('selectedTime', info.endStr);

            // redirect to appointment creation page
            window.location.href = 'create_appointment.php'; 
        },

        // fetch appointments from server 
        events: 'fetch_appointments.php'
    });
    
    calendar.render(); 
});
</script>

</body>
</html>