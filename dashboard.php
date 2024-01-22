<?php
session_start();
include 'includes/header.php';
include 'connection/db_connection.php';
?>

<div class="container emp-profile" style="margin-top: 150px; margin-bottom: 350px;">
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       WELCOME BACK!
                                    </h5>
                                    <h6>
                                    <?php echo $_SESSION["user_name"]; ?>! <!-- Display the user's name here -->
                                    </h6>
                                   
                           
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-2">
                       <a class="btn btn-danger profile-edit-btn" href="chat_user.php">Chat Now</a>
                    </div>
                    <div class="col-md-2">
                       <a class="btn btn-danger profile-edit-btn" href="logout.php">LOGOUT</a>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow mb-5">
    <!-- Lined tabs-->
    <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
      <li class="nav-item flex-sm-fill">
        <a id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active">My Account</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="profile2-tab" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0">Orders</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0">Appointment</a>
      </li>
      </li>
    </ul>
    <div id="myTab2Content" class="tab-content">
      <div id="home2" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
       
     <?php
     
     $session_user = $_SESSION["user_id"];

     $user_data = mysqli_query($conn, "SELECT * FROM `tbl_army` WHERE `id`= '$session_user'");
     $user_row = mysqli_fetch_assoc($user_data);
     ?>
<table class="table">
  <tbody>
    <tr>
      <td>Name</td>
      <td><?php echo $user_row['name'];?></td>
    </tr>
    <tr>
      <td>Army ID</td>
      <td><?php echo $user_row['army_id'];?></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><?php echo $user_row['phone'];?></td>
    </tr>
    <tr>
      <td>Email Address</td>
      <td><?php echo $user_row['email'];?></td>
    </tr>
  </tbody>
</table>
       
      </div>
      <div id="profile2" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
       
      <?php
$session_user = $_SESSION["user_id"];
$sql = "SELECT * FROM orders WHERE user_id = $session_user";
$result = $conn->query($sql);
?>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['product_name'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['total_price'] . '</td>';

                    // Define an array to map statuses to Bootstrap badge classes
                    $statusClasses = [
                        'Pending' => 'badge badge-warning',
                        'confirmed' => 'badge badge-success',
                        'on_the_way' => 'badge badge-info',
                        'on_hold' => 'badge badge-purple',
                        'canceled' => 'badge badge-danger',
                        'done' => 'badge badge-secondary',
                    ];

                    // Get the Bootstrap badge class based on the status
                    $statusClass = $statusClasses[$row['status']] ?? 'badge badge-secondary';

                    // Display the status with the corresponding Bootstrap badge
                    echo '<td><span class="' . $statusClass . '">' . $row['status'] . '</span></td>';

                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">No orders found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>


      </div>
      <div id="contact2" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
    <?php
     $session_user = $_SESSION["user_id"];
      $sql = "SELECT * FROM bookappointments WHERE user_id = $session_user";
$result = mysqli_query($conn, $sql);

// Step 2: Display the data in a table
if (mysqli_num_rows($result) > 0) {
  echo '<table class="table table-bordered table-striped">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Name</th>';
  echo '<th>Email</th>';
  echo '<th>Phone</th>';
  echo '<th>Address</th>';
  echo '<th>Date</th>';
  echo '<th>Time</th>';
  echo '<th>Message</th>';
  echo '<th>Status</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['time'] . '</td>';
    echo '<td>' . $row['message'] . '</td>';
    echo '<td><span class="badge ';
    
    switch ($row['status']) {
        case 'Pending':
            echo 'badge-warning';
            break;
        case 'Approved':
            echo 'badge-success';
            break;
        case 'Cancelled':
            echo 'badge-danger';
            break;
        default:
            echo 'badge-secondary';
    }
    
    echo '">' . $row['status'] . '</span></td>';
    echo '</tr>';
}


    echo '</table>';
} else {
    echo 'No records found.';
}

// Close the database connection when done
mysqli_close($conn);
?>


      </div>
     
    </div>
    <!-- End lined tabs -->
  </div>
            </form>           
        </div>


        <style>
            .emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
@media (min-width: 576px) {
  .rounded-nav {
    border-radius: 50rem !important;
  }
}

@media (min-width: 576px) {
  .rounded-nav .nav-link {
    border-radius: 50rem !important;
  }
}

/* With arrow tabs */

.with-arrow .nav-link.active {
  position: relative;
}

.with-arrow .nav-link.active::after {
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #2b90d9;
  position: absolute;
  bottom: -6px;
  left: 50%;
  transform: translateX(-50%);
  display: block;
}

/* lined tabs */

.lined .nav-link {
  border: none;
  border-bottom: 3px solid transparent;
}

.lined .nav-link:hover {
  border: none;
  border-bottom: 3px solid transparent;
}

.lined .nav-link.active {
  background: none;
  color: #555;
  border-color: #2b90d9;
}



.nav-pills .nav-link {
  color: #555;
}
.text-uppercase {
  letter-spacing: 0.1em;
}
        </style>

<?php
include 'includes/footer.php';
include 'includes/modal.php';
?>
