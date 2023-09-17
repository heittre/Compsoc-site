<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $contact_no = $_POST["contact_no"];
    $memb_status = $_POST["memb_status"];
    $expect = $_POST["expect"];
    $comments = $_POST["comments"];

    // Connect to your database (replace with your database credentials)
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "compsoc";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database (replace with your table structure)
    $sql = "INSERT INTO delegate(full_name, email, contact_no, expect,memb_status, comments)
            VALUES ('$full_name', '$email', '$contact_no','$expect','$memb_status' , '$comments')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "Thank you for registering!";
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect to the registration page
    header("Location: registration_form.html");
}
?>
