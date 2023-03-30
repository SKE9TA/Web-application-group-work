
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>
<body>
   <h1>BODABORA</h1> 
  
    <div class="container1">
        <div class="forms">
            <!-- Registration Form -->
            <div class="form signup">
                <span class="title"><?php username ?> Details</span>

                <form action="#">
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

                </form>

            </div>
        </div>
    </div>

    <script src="script.js"></script>
<nav><a href="./usermodule.html"></a></nav>
</body>
</html>
