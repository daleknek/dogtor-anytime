<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5//+L169gTuijdeOV_jsDO4z9ceW4fmcpJHxsdjKVN" crossorigin="anonymous">
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

    .row {
        margin-top: 40px;
    }

    .footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
</style>
    <body class='custom-bg'>
        <?php include 'header.php'; ?>
        <?php 
            $clinic =  $vet['clinic'];
            $address = $vet['address'];
            $phone =  $vet['phone'];
            $hours = $vet['hours'];
            $aboutUs = $vet['aboutUs'];
            $specialization = $vet['specialization'];
            echo "<div class='row'>
            <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-4'> 
                        <img src='images/clinicphoto.jpg' class='clinic-photo' alt='clinicphoto'>
                    </div>
                    <div class='col-md-8'> 
                        <p class='h2'>
                        $clinic
                        </p> 
                        <dl class='row'>
                            <dt class='col-sm-3'>Address</dt>
                            <dd class='col-sm-9'>$address</dd>
                            <dt class='col-sm-3'>Contact</dt>
                            <dd class='col-sm-9'>
                              <p>$phone</p> 
                            </dd>
                            <dt class='col-sm-3'>Hours</dt>
                            <dd class='col-sm-9'>$hours</dd>
                        </dl>
                    </div>
                </div>
                <br> 
            <div class='aboutme'>
                <p class='h5 text-muted'>About Us</p>
                <p>$aboutUs</p> 
                <p class='h6 text-muted'>Specialization:    
                </p>
                <p>$specialization<p>
            </div>
        </div>";
        ?>
        <div class="col-md-4" id="calendar"> 
        </div>
    </div>
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


<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" 
integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var vetId = <?php echo json_encode($vetId); ?>;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale:'us',
        initialView: 'timeGridWeek', // show a weekly view initially
        selectable: true, // allows user to select time slots
        eventTimeFormat: { // like '14:30:00'
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            meridiem: false
        },

        select: info => createAppointment(info),

        // fetch appointments from server 
        // events: 'fetch_appointments.php'
    });

    const createAppointment = (info) => { // called when user selects a time slot
            alert('Slot selected!');
            console.log(info);
            const date = moment(info.startStr).format('YYYY-MM-DD');
            const time = moment(info.endStr).format('hh:mm:ss')
            console.log(time);
            // Send AJAX request to server
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    date: date,
                    time: time,
                    vetId: vetId
                },
                success: function(response) {
                    // Handles response, displays a success message.
                    alert('Appointment created successfully!');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handles error
                    alert('An error occurred while creating the appointment: ' + errorThrown);
                }
            });
        }

    calendar.render(); 
});


</script>

</body>
</html>