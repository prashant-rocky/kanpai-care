<?php
// Database connection setup
$servername = "localhost";
$username = "root";      // Default for XAMPP/WAMP
$password = "";          // Usually empty for localhost
$dbname = "kanpai_care";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$first_name   = $conn->real_escape_string($_POST['first_name']);
$last_name   = $conn->real_escape_string($_POST['last_name']);
$email   = $conn->real_escape_string($_POST['email']);
$phone   = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);

// Insert data into contact_form table
$sql = "INSERT INTO contact_form (first_name, last_name, email, phone, message)
        VALUES ('$first_name', '$last_name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
  // Redirect to thank you page
  header("Location: thankyou.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
