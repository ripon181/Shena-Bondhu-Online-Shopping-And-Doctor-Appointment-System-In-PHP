<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shena Bondhu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">Shena Bondhu</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#adminLoginModal">Admin</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#hospitalDoctorLoginModal">Hospital & Doctor</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#armyUsersLoginModal">Army & Users</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="groceryshop.php">Grocery Shop</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="medicineshop.php">Medicine Shop</a>
        </li>
        <?php if (isset($_SESSION['army_logged_in']) && $_SESSION['army_logged_in'] === true) { ?>
        <!-- Display the "Appointment" link when the user is logged in -->
        <li class="nav-item">
            <a class="nav-link" href="appointment.php">Appointment</a>
        </li>
    <?php } ?>
        <li class="nav-item">
                        <?php
                        include 'connection/db_connection.php';

                        if (isset($_SESSION['army_logged_in']) && $_SESSION['army_logged_in'] === true) {
                            $select_product = mysqli_query($conn, "SELECT * FROM cart") or die('query Failed');
                            $row_count = mysqli_num_rows($select_product);
                            echo '<a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i><span><sup style="color:#fff; font-size:20px;">' . $row_count . '</sup></span></a>';
                        } else {
                            echo '<button type="button" class="btn btn-info w-100" data-toggle="modal" data-target="#armyUsersLoginModal">
                            <i class="fa-solid fa-cart-shopping"></i>
                                  </button>';
                        }
                        ?>
                    </li>
        </li>
        <li class="nav-item">
    <?php if (isset($_SESSION['army_logged_in']) && $_SESSION['army_logged_in'] === true) { ?>
        <a href="dashboard.php"><i class="fa-solid fa-user"></i></a>
    <?php } else { ?>
        <button type="button" class="btn btn-info w-100" data-toggle="modal" data-target="#armyUsersLoginModal">
            <i class="fa-solid fa-user"></i>
        </button>
    <?php } ?>
</li>

        
      </ul>
      </div>
      </div>
    </nav>
   <style>
    .nav-item i{
    color: white;
    font-size: 24px;
    margin-top: 14px;

}
   </style> 