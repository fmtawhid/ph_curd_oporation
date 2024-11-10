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
            <a href="index.php">Client List</a>
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
        </nav>
        <?php
        if (isset($_GET["success_sms"])) {
            echo '
            <!-- Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content w-50 h-75 float-right">
                        <div class="">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            '. htmlspecialchars($_GET["success_sms"]) .'
                        </div>
                    </div>
                </div>
            </div>

            <script>
                
            </script>
            ';
        }
        ?>

        <div class="container-fluid mt-4">
          <h2>Welcome to the Dashboard</h2>
          <p>This is a simple example of a sidebar toggle dashboard with a search bar and menu items.</p>
        </div>