<?php
include "dbcon.php"; // Include your database connection

$row = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the client data based on the ID
    $query = "SELECT * FROM clients WHERE id = $id";  
    $result = mysqli_query($connection, $query);  

    if (!$result) {
        die("Query failed: " . mysqli_error($connection)); 
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "No client found with the given ID.";
        }
    }
}

if (isset($_POST["update_students"])) {
    if (isset($_GET['id'])) {
        $idnew = $_GET['id'];
        $name = $_POST["n_name"];
        $email = $_POST["n_email"];
        $address = $_POST["address"];

        $query = "UPDATE clients SET name='$name', email='$email', address='$address' WHERE id = '$idnew'";
        $result = mysqli_query($connection, $query);  

        if (!$result) {
            die("Query failed: " . mysqli_error($connection)); 
        } else {
            
            header("Location: update.php?message=Please fill in all fields");

            $query = "SELECT * FROM clients WHERE id = $idnew";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
        }
    }
}
?>

<?php include 'header.php' ?>

        <!-- Content -->
        <div class="container mt-4">
            <h3>Update Client Information</h3>
            <form action="update.php?id=<?php echo isset($id) ? $id : ''; ?>" method="post">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="n_name" class="form-control" id="name" placeholder="Enter Your Name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="n_email" class="form-control" id="email" placeholder="Enter email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" name="update_students">
                </div>
            </form>
        </div>

<?php include 'footer.php'?>
   