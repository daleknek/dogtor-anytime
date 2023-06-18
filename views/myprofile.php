
    <style>

        .dropdown-menu .dropdown-item.sign-out {
            color: red;
        }

        .main-section {
            background: url("images/bg_profile.webp") center center;
            min-height: calc(100vh - 72px);
            display: flex;
            justify-content: center fixed;

            padding-top: 80px;
        }

        .rounded-circle.img-circle {
            width: 150px;
            height: 150px;
            object-fit: cover;
            object-position: center;
        }

        .alert-info {
            max-height: 60px;
        }
    </style>
    <script>
        var initialData = {
            name: "",
            surname: "",
            email: "",
            password: ""
        };

        function enableEditMode() {
    initialData.name = $("input[name='name']").val();
    initialData.surname = $("input[name='surname']").val();
    initialData.email = $("input[name='email']").val();
    initialData.password = $("input[name='password']").val();

    $("input").prop("disabled", false);
    $("button.btn.btn-secondary").prop("disabled", false);
    $("#save-changes").show();
    $("#cancel").show();
    $("#edit-details").hide();
    $("#avatar-upload-section").show();
    enableUploadButton(); // Add this line

}

        function disableEditMode() {
          $("input[name='name']").val(initialData.name);
            $("input[name='surname']").val(initialData.surname);
            $("input[name='email']").val(initialData.email);
            $("input[name='password']").val(initialData.password);

            $("input").prop("disabled", true);
    $("button.btn.btn-secondary").prop("disabled", true);
    $("#edit-details").prop("disabled", false);
    $("#save-changes").hide();
    $("#cancel").hide();
    $("#edit-details").show();
    enableUploadButton(false);
    $("#avatar-upload-section").hide();


}

        // Added this function
        function enableUploadButton(enable = true) {
            $("input[type='file']").prop("disabled", !enable);
        }

        function togglePasswordVisibility() {
  const passwordField = document.getElementById("password");
  const visibilityButton = document.querySelector("button.btn.btn-secondary");

  if (passwordField.type === "password") {
    passwordField.type = "text";
    visibilityButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
  } else {
    passwordField.type = "password";
    visibilityButton.innerHTML = '<i class="fas fa-eye"></i>';
  }
}


    </script>
<?php include 'header.php'; ?>
<div class="bs-body-color-255,255,255">

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require 'Config/dbConnect.php';

    $user_logged_in = isset($_SESSION['id']);

    if ($user_logged_in) {
        $patientId = $_SESSION['id'];

        $sql = "SELECT * FROM patient WHERE patientId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $patientId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_data = $result->fetch_assoc();

        $stmt->close();

        if (is_null($user_data['avatar'])) {
            $user_avatar_base64 = "";
        } else {
            $user_avatar_base64 = base64_encode($user_data['avatar']);
        }
    }
        
    $conn->close();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      require 'Config/dbConnect.php';
  
      $image_uploaded = false;
      $patientId = $_POST['patientId'];
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      function is_valid_image($file_path)
      {
          $valid_mime_types = array('image/jpeg', 'image/png', 'image/gif');
          $mime_type = mime_content_type($file_path);
          return in_array($mime_type, $valid_mime_types);
      }
  
      $uploaded_file = $_FILES['avatar']['tmp_name'];
  
      $conn->query("SET GLOBAL max_allowed_packet = 104857600"); // Allow larger BLOB data (up to 100MB)
  
      if (is_uploaded_file($uploaded_file) && is_valid_image($uploaded_file)) {
          $avatar_binary_data = file_get_contents($uploaded_file);
          $stmt = $conn->prepare("UPDATE patient SET avatar = ? WHERE patientId = ?");
          $stmt->bind_param("bi", $null, $patientId);
          $stmt->send_long_data(0, $avatar_binary_data);
          $stmt->execute();
  
          if ($stmt->affected_rows > 0) {
              $image_uploaded = true;
              $user_data['avatar'] = $avatar_binary_data;
              $user_avatar_base64 = base64_encode($avatar_binary_data);
          }
  
          $stmt->close();
      }
  
      $stmt = $conn->prepare("UPDATE patient SET name = ?, surname = ?, email = ?, password = ? WHERE patientId = ?");
      $stmt->bind_param("ssssi", $name, $surname, $email, $password, $patientId);
      $stmt->execute();
  
      $details_updated = ($stmt->affected_rows > 0);
  
      if (!$details_updated && !$image_uploaded) {
          $message = "Oops something went wrong! Please try again.";
          $alert_class = "alert-danger";
      } else {
          $message = "Your details have been updated!";
          $alert_class = "alert-success";
  
          $user_data['name'] = $name;
          $user_data['surname'] = $surname;
          $user_data['email'] = $email;
          $user_data['password'] = $password;
      }
  
      $stmt->close();
      $conn->close();
  }
  ?>
    <main class="main-section">
        <?php if ($user_logged_in) : ?>
            <div class="container">

                <?php if (!empty($message)) : ?>
                    <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <h1>Welcome, <?php echo htmlspecialchars($user_data['name']); ?>!</h1>
                <hr>
                <form id="update-form" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                            <img src="data:image/jpeg;base64,<?php echo $user_avatar_base64; ?>" class="rounded-circle img-circle mb-3" alt="avatar">                               
                            <div id="avatar-upload-section" style="display: none;">
                              <h6>Upload a different photo:</h6>
                              <input type="file" name="avatar" id="avatar-input" class="form-control" disabled>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-9 personal-info">

                            <div class="form-group">
                                <label class="col-lg-3 control-label">First Name</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="name" value="<?php echo $user_data['name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Last Name</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="surname" value="<?php echo $user_data['surname']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="email" value="<?php echo $user_data['email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" value="<?php echo $user_data['password']; ?>" disabled>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" onclick="togglePasswordVisibility()" disabled><i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="patientId" value="<?php echo $patientId; ?>">
                            <div class="form-group">
<label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <div class="buttons">
                                        <input type="button" id="edit-details" class="btn btn-primary" value="Edit Details" onclick="enableEditMode()">
                                        <input type="submit" id="save-changes" class="btn btn-primary" value="Save Changes" style="display: none;">
                                        <span></span>
                                        <input type="reset" id="cancel" class="btn btn-outline-primary" value="Cancel" style="display: none;" onclick="disableEditMode()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
        <?php else : ?>
            <div class='alert alert-info' role='alert'>Please log in to view your profile.</div>
        <?php endif; ?>
    </main>
</div>
<?php include 'footer.php'; ?>