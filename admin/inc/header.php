<?php include '../connection/db_connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

     <!-- Our Custom CSS -->
     <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>ADMIN <span>PANEL</span></h4>
                <img src="images/admin.png" alt="">
                <h5>SUPER ADMIN</h5>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->
                
               
                <li>
                    <a href="addProduct.php">Add Product</a>
                </li>
                <li>
                    <a href="manageProduct.php">Manage Product</a>
                </li>
                <li>
                    <a href="manageOrders.php">Manage Orders</a>
                </li>
                <li>
                    <a href="customers.php">Customers</a>
                </li>
            </ul>
            
           
            
        </nav>
          <!-- Page Content Holder -->
          <div id="content">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <label for="check" id="sidebarCollapse">
            <i class="fas fa-bars" id="sidebar_btn"></i>
          </label>
        
        <div class="button">
        <a class="btn btn-danger" href="logout.php">LOGOUT</a>
        </div>
</nav>