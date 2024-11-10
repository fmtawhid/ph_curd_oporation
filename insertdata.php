<?php
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["n_name"];
    $email = $_POST["n_email"];
    $address = $_POST["address"];

    // Check if any field is empty
    if (empty($name) || empty($email) || empty($address)) {
        header("Location: index.php?message=Please fill in all fields");
        exit();
    } else {
        // Use prepared statement to insert data
        $query = "INSERT INTO clients (name, email, address) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $address);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                header("Location: index.php?success_sms=Student added successfully");
                exit();
            } else {
                header("Location: index.php?message=Failed to add student");
                exit();
            }

            
        } else {
            die("Query Error: " . mysqli_error($connection));
        }
    }
} else {
    header("Location: index.php?message=Invalid request method");
    exit();
}
?>
