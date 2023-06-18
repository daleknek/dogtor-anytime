<!doctype html>
<html>
<head>

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
    <nav class='navbar fixed-top navbar-light bg-light'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>Dogtor Anytime</a>
        </div>
    </nav>
    <body class='custom-bg'>
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
                    $specialization
                </p>
            </div>
        </div>";
        ?>
        <div class="col-md-4" id="calendar"> 
        </div>
    </div>

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