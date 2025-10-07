<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kanpai_care";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$location = $_POST['location'];

// Corrected query (removed sno column)
$sql = "INSERT INTO `consultant` (name, phone, date, location) 
        VALUES ('$name', '$phone', '$date', '$location')";

if ($conn->query($sql) === TRUE) {
  header("Location: thankyou.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
