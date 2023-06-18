<<<<<<< HEAD
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5//+L169gTuijdeOV_jsDO4z9ceW4fmcpJHxsdjKVN" crossorigin="anonymous">
=======
>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95
<style>

    .row {
        margin-top: 40px;
    }

    .avatar {
        max-width: 250px;
        max-height: 200px;
    }

    .avatar img {
        width: 100%;
        height: 100%;
    }

    .main-section {

      min-height: calc(100vh - 56px); /* Subtracting the header and footer height */
      display: flex;
      align-items: center;
      justify-content: center;
      
     }   
    
</style>
<<<<<<< HEAD
    <body class='custom-bg'>
        <?php include 'header.php'; ?>
=======
<?php include 'header.php'; ?>
    <main class="main-section">
    <div class="container">
>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95
        <?php 
            $clinic =  $vet['clinic'];
            $address = $vet['address'];
            $phone =  $vet['phone'];
            $hours = $vet['hours'];
            $aboutUs = $vet['aboutUs'];
            $specialization = $vet['specialization'];
            if (is_null($vet['avatar'])) {
                $avatar = "";
            } else {
                $avatar = base64_encode($vet['avatar']);
            }
            echo "<div class='row'>
            <div class='col-md-8'>
                <div class='row'>
                    <div class='avatar'> 
                    <img src='data:image/jpeg;base64,$avatar' class='rounded-circle img-circle mb-4' alt='avatar'>
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
        </main>
<?php include 'footer.php'; ?>


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

