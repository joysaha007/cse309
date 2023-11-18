<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$link = mysqli_connect("localhost", "root", "", "contact");

// Check connection
if ($link === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

// Use prepared statement to prevent SQL injection
$sql = "INSERT INTO table1 (name, email, phone, message) VALUES (?, ?, ?, ?)";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Records added successfully";
    } else {
        echo "Error: " . mysqli_error($link);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($link);
}

// Close the connection
mysqli_close($link);
?>
