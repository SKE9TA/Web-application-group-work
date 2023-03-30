<?php
session_start();
// if(!$_SESSION['username']) {
//     header("location: ../index.html");
// }
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
    
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="../index.html">BODABORA</a>
          
          <form action="../auth/processregister.php" method="post" class="form-inline mr-3">
          <a class="nav-link" href="#"><?php echo $_SESSION['username'] ?></a>
            <input class="form-control mr-sm-2" type="submit" name="logout" value="Logout">
          </form>
        </nav>

        <div class="forms">
            <!-- Registration Form -->
            <div class="container">

            <div class="form profile">
                <span class="title">Profile Details</span>

                <form action="">
                    <div class="input-field">
                        <input type="number" placeholder="Motorcycle VIN /VIN ya Pikipiki" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="National ID /ID ya kitaifa" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="number" placeholder="License number" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Name/jina" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Residential area/mtaa wako" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accept all terms and conditions</label>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="profilesubmit" value="Submit">
                    </div>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
<nav><a href="../usermodule.html"></a></nav>
</body>
</html>

