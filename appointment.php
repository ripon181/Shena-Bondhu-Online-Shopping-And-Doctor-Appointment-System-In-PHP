<?php include 'includes/header.php'; ?>

<style>
    
</style>
<div class="container">
    <div class="row" style="margin-top: 80px; margin-bottom: 550px;">
        <h4 style="margin-top: 80px;">Get a doctor appointment</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Doctor Name</th>
                    <th>Department</th>
                    <th>Hospital Name</th>
                    <th>Visit</th>
                    <th>Status</th>
                    <th>Actions</th> <!-- Add the Actions column header -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Step 2: Retrieve Appointments

                $sql = "SELECT * FROM tbl_appointments";
                $result = mysqli_query($conn, $sql);
                // Step 3: Display Appointments
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td><img src="hospital/' . $row['image'] . '" alt="Doctor\'s Image" class="img-thumbnail" width="100" height="100"></td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['department'] . '</td>';
                        echo '<td>' . $row['hospitalName'] . '</td>';
                        echo '<td>' . $row['visit'] . '</td>';
                        
                        
                        // Display the status with a Bootstrap badge
                        $statusClass = ($row['status'] == 'Available') ? 'badge badge-success' : 'badge badge-danger';
                        echo '<td><span class="' . $statusClass . '">' . ucfirst($row['status']) . '</span></td>';
                        
                        // Add a button to trigger the modal
                        echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal">Get Appointment</button></td>';
                        
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No appointments found.</td></tr>';
                }

                // Close the database connection when done
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- "Get Appointment" Modal -->
<div class="modal fade bd-example-modal-lg" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Get Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your appointment form here -->
                <form action="submit_appointment.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                    <h6>Please make your payment on this number(01749475566) then fill the form</h6>
                        <label for="phone_number">Phone NUmber:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="transaction_number">Transcation NUmber:</label>
                        <input type="text" class="form-control" id="transaction_number" name="transaction_number" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <?php include 'includes/footer.php'; ?>
</footer>
<?php include 'includes/modal.php'; ?>
</body>
</html>