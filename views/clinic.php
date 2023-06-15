<!doctype html>
<html>
<head>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

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
                        <p class="h2">Vet Clinic</p> <!-- this has to change dynamically -->
                        <dl class="row">
                            <dt class="col-sm-3">Address</dt>
                            <dd class="col-sm-9">1 Somewhere str, 135 79, Athens</dd>
                            <dt class="col-sm-3">Contact</dt>
                            <dd class="col-sm-9">
                              <p>+30 210 67890123</p>
                            </dd>
                            <dt class="col-sm-3">Hours</dt>
                            <dd class="col-sm-9">9am - 9pm</dd>
                        </dl>
                    </div>
                </div>
                <br> 
            <div class="aboutme">
                <p class="h5 text-muted">About Me</p>
                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. 
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                    Phasellus hendrerit. 
                    Pellentesque aliquet nibh nec urna. 
                    In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. 
                    Nullam mollis. Phasellus hendrerit.
                </p>
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