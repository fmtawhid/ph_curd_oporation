<?php
include 'dbcon.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM clients WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: index.php?success_sms=Student deleted successfully");
            exit();
        } else {
            header("Location: index.php?message=Failed to delete student");
            exit();
        }

        
    } else {
        die("Query Error: " . mysqli_error($connection));
    }
} else {
    // Redirect if 'id' is not set
    header("Location: index.php?message=No student ID provided");
    exit();
}
?>
