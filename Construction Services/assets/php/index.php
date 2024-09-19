<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'construction_services';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $first_name = $_POST['First_Name'];
  $last_name = $_POST['Last_Name'];
  $email = $_POST['Mail'];
  $phone = $_POST['Phone'];
  $message = $_POST['Message'];

  // Validate form data
  if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($message)) {
    echo "Please fill in all fields.";
  } else {
    // Insert form data into database
    $sql = "INSERT INTO contact (first_name, last_name, email, phone, message) VALUES ('$first_name', '$last_name', '$email', '$phone', '$message')";
    if ($conn->query($sql) === TRUE) {
      echo "Message sent successfully!";
    } else {
      echo "Error sending message: " . $conn->error;
    }
  }
}

// Close connection
$conn->close();
?>
