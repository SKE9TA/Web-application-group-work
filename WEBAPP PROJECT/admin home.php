<?php

include '../classes/admin.php';
session_start();
//Condition to access admin page
if ($_SESSION['username'] !=  "admin@test.com") {
  header("location: ../index.html");
}
$con = new DBConnector();
$pdo = $con->connectToDB();
$admin = new Admin();
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

  <!--<title>Login & Registration Form</title>-->
</head>

<body style="background-color: #4070f4; display:block;">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.html">BODABORA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Admin</a>
      </div>
    </div>


    <form action="../auth/processregister.php" method="post" class="form-inline">
      <a class="nav-link" href="#"><?php echo $_SESSION['username'] ?></a>
      <input class="form-control mr-sm-2" type="submit" name="logout" value="Logout">
    </form>
  </nav>

  <div class="content-box">
    <div class="content-1">
    </div>
    <div class="content-2">
      <table>
        <h2>Table of Riders</h2>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>National ID</th>
            <th>Bike VIN</th>
            <th>License No</th>
            <th>Residence</th>
            <th>Approved</th>
        </thead>
        <tbody>
          <?php $rows = $admin->readRiders($pdo);
          var_dump($row);
          foreach ($value as $row) {
            echo "<tr> 
        <td>" . $value['name'] . "</td>
                <td>" . $value['email'] . "</td>
                <td>" . $value['national_id'] . "</td>
                <td>" . $value['bike_vin'] . "</td>
                <td>" . $value['license_no'] . "</td>
                <td>" . $value['residence'] . "</td>
                <td><input type='checkbox' value=" . $value['approved'] . "></input></td>
            </tr>";
          }
          ?>
        </tbody>
      </table>

    </div>

    <script src="../script.js"></script>
    <nav><a href="../usermodule.html"></a></nav>
</body>

</html>