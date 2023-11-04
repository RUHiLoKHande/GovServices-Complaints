<?php
// Define your MySQL database connection details
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = 'your_mysql_password'; // Replace with your database password
$database = 'project1'; // Replace with your database name

// Attempt to connect to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Create an SQL query to insert contact form data into the 'contact_form' table
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
