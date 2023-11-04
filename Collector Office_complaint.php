<?php
// Define your MySQL database connection details
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'DATABASE2'; // Name of your database

// Attempt to connect to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$village = $_POST['village'];
$district = $_POST['district'];
$state = $_POST['state'];
$complaintType = $_POST['complaintType'];
$complaintText = $_POST['complaintText'];
$fileUpload = $_POST['fileUpload']; // This assumes you're uploading file names, not the actual files

// Create an SQL query to insert data into the 'complaints' table
$sql = "INSERT INTO complaints(name, village, district, state, complaint_type, complaint_text, file_upload) VALUES ('$name', '$village', '$district', '$state', '$complaintType', '$complaintText', '$fileUpload')";

if (mysqli_query($conn, $sql)) {
    echo "Complaint submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
