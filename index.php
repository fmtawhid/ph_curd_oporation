<?php 
    // Include the database connection
    include 'dbcon.php';

    // Fetch data from the database
    $query = "SELECT * FROM students";  
    $result = mysqli_query($connection, $query);  // Run the query and store the result

    if (!$result) {
        die("Query failed: " . mysqli_error($connection)); 
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-dark text-white sidebar" id="sidebar">
        <div class="sidebar-header">
          <h3>Dashboard</h3>
        </div>
        <ul class="list-unstyled components">
          <li>
            <a href="#">Dashboard</a>
          </li>
          <li>
            <a href="#">Settings</a>
          </li>
        </ul>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <!-- Top Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light tgl">
          <button class="btn btn-outline-secondary" id="menu-toggle">☰</button>
          <form class="form-inline ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </nav>

        <div class="container-fluid mt-4">
          <h2>Welcome to the Dashboard</h2>
          <p>This is a simple example of a sidebar toggle dashboard with a search bar and menu items.</p>
        </div>

        <div class="d-block p-2 container align-right justify-content-end text-white">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
        </button>

    
        </div>
        <?php
            if (isset($_GET["message"])) {
                echo "<h6 class='bg-dark text-white'>" . htmlspecialchars($_GET["message"]) . "</h6>";
            }
        ?>

        <!-- Table to Display Data -->
        <div class="container mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
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
                    <input type="text" name="n_name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="n_email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>


                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="n_address" class="form-control" id="address" aria-describedby="addressHelp" placeholder="Enter Address">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Add" name="add_student">
                </div>

            </form>
            </div>

            </div>
        </div>
        </div>




      </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Toggle -->
    <script>
      document.getElementById('menu-toggle').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('page-content-wrapper').classList.toggle('toggled');
      });
    </script>

  </body>
</html>
