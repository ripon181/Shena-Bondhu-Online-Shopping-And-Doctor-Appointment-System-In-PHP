<?php include 'inc/header.php'; ?>

<!------------content-body------------>
<div class="container">
    <?php
    $sql = "SELECT * FROM bookappointments";
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
        echo '<th>Update Status</th>'; // Add a new column header for updating status
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
            echo '<td>' . $row['status'] . '</td>';

            // Add a form to update the status
            echo '<td>';
            echo '<form action="updateAppointment_status.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<select name="status">';
                    echo '<option value="pending">Pending</option>';
                    echo '<option value="Approved">Approved</option>';
                    echo '<option value="Canceled">Cancelled</option>';
                    echo '</select>';
                    echo '<input type="submit" class="btn btn-info" value="Update">';
                    echo '</form>';
            echo '</td>';

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

<?php include 'inc/footer.php'; ?>
