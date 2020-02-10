

  <?php
  $servername = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "blackbook";

  $conn = mysqli_connect($servername, $db_username, $db_password);
  $db_config = mysqli_select_db($conn, $db_name);
  if ($db_config) {
    //echo "Database connection successful";

  } else {
    die('
        <div class="card-body">
            <h1 class="card-title bg-warning">Database Connection Failed</h1>
            <h2 class="card-title">Database Failure</h2>
            <p class="card-text"> Please Check Your Databse Connection</P>
            a href="index.php" class="btn btn-primary">:)</a>
            <hr>
            </div>
            ' . mysqli_connect_error());
  }
