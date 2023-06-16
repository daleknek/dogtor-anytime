<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Validate form data (you can add more validation if needed)
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    // Handle validation error (e.g., display an error message)
    echo "Please fill in all fields.";
    exit;
  }

  // Create email body
  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Subject: $subject\n";
  $body .= "Message:\n$message";

  // Set up email headers
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";

  // Send the email
  $to = "xristmor@gmail.com";  // Replace with your email address
  $subject = "New Contact Form Submission";
  $success = mail($to, $subject, $body, $headers);

  if ($success) {
    // Redirect back to contactus.php with success status
    header("Location: ../contactUs?status=success");
    exit;
  } else {
    // Handle email sending error (e.g., display an error message)
    header("Location: ../contactUs?status=error");
    exit;
    // echo "Sorry, there was a problem sending your message. Please try again later.";
  }
}
?>
