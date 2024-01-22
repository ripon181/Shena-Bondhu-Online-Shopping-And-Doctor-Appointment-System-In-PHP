<?php
include 'inc/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $department = $_POST["department"];
    $hospitalName = $_POST["hospitalName"];
    $visit = $_POST["visit"];
    $status = $_POST["status"]; 
    
    // Handle image upload
    $targetDirectory = "doctors/"; // Specify your target directory
    $imagePath = $targetDirectory . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    
    // Insert data into tbl_appointments
    $sql = "INSERT INTO tbl_appointments (name, department, hospitalName, visit, image, status) 
    VALUES ('$name', '$department', '$hospitalName', '$visit', '$imagePath', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Appointment added successfully!"); window.location.href = "addAppointment.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}

?>
            
            <!------------content-body------------>
            <div class="card" style="width: 50%;margin: 0 auto;">
  <div class="card-body" style="background-color:#4dd9c52ec;">
            <div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Doctor Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" name="department" required>
                </div>
                <div class="form-group">
                    <label for="hospitalName">Hospital Name:</label>
                    <input type="text" class="form-control" id="hospitalName" name="hospitalName" min="0.01" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="visit">Visit:</label>
                    <input type="text" class="form-control" id="visit" name="visit" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
                </div>

                <input type="submit" class="btn btn-primary w-100" value="Add Appointment">`
            </form>
        </div>
    </div>
</div>
</div>
</div>     
<?php
include 'inc/footer.php';
?>
     