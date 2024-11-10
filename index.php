<?php 
    // Include the database connection
    include 'dbcon.php';

    // Fetch data from the database
    $query = "SELECT * FROM clients";  
    $result = mysqli_query($connection, $query);  

    if (!$result) {
        die("Query failed: " . mysqli_error($connection)); 
    }
?>

<?php include 'header.php' ?>

        <div class="d-block p-2 container align-right justify-content-end text-white">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add student
        </button>

    
        </div>







        <!-- Table to Display Data -->
        <div class="container mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['name'] . "</td>"; 
                        echo "<td>" . $row['email'] . "</td>"; 
                        echo "<td>" . $row['address'] . "</td>"; 

                        echo "<td>
                                <a href='update.php?id=" . $row['id'] . "'>Update</a> | 
                                <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                              </td>";

                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        </div>


        <!-- Modal -->
        <div class="modal fade  modelcustom" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <form action="insertdata.php" method="post">
              <div class="form-group">
                  <label for="name">Your Name</label>
                  <input type="text" name="n_name" class="form-control" id="name" placeholder="Enter Your Name">
              </div>

              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="n_email" class="form-control" id="email" placeholder="Enter email">
              </div>

              <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
              </div>

              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Add" name="add_student">
              </div>
          </form>

            </div>

            </div>
        </div>
        </div>



<?php include "footer.php" ?>