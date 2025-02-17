

   <!-- 🔹 Bootstrap Modal (Pop-Up Form) -->

    <div class="modal fade" id="assignScannerModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignModalLabel">Assign Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="scanners.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Device Name</label>
                            <select id="device_name" name="device_name" class="form-control" onchange="fillComputerDetails(this.value)">
                            <option value="">Select a Device</option>
                            <?php
    include '../db_connection.php'; // Ensure you have a connection to MySQL
    $query = "SELECT equipment_name, equipment_serialNumber FROM equipment_received WHERE status = 'Available' AND equioment_type = 'Scanner/Printer'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['equipment_name'] . '">' . $row['equipment_name'] . '</option>';
    }
    ?>
</select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Device Type</label>
                            <select name="device_type" required>
                                <option value="Printer">Printer</option>
                                <option value="Scanner">Scanner</option>
                                <option value="Photocopier">Photocopier</option>
                                <option value="Other">Other</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Device Brand</label>
                            <input type="text" id="device_brand" name="device_brand" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" id="device_serial_number" name="device_serial_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Device Level</label>
                            <select name="device_level" required>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>                       
                         </div>
                        <div class="mb-3">
                            <label class="form-label">Staff Assigned</label>
                            <input type="text" class="form-control" name="staff_assigned" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Staff Department</label>
                            <select name="staff_department" required>
                                <option value="ICT Department">ICT Department</option>
                                <option value="Procurement Department">Procurement Department</option>
                                <option value="Research Department">Research Department</option>
                            </select>                          
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Staff Office</label>
                            <input type="text" class="form-control" name="staff_office" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Staff Title</label>
                            <input type="text" class="form-control" name="staff_title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assigned By</label>
                            <input type="text" class="form-control" name="assigned_by" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date Assigned</label>
                            <input type="date" class="form-control" name="date_assigned" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" required>
                                <option value="In Use">In Use</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <input type="text" class="form-control" name="remarks" required>
                        </div>
                        <button type="submit" class="btn btn-success">Assign Device</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for modal functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    


</body>
</html>

<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device_name = $_POST['device_name'];
    $device_type = $_POST['device_type'];
    $device_brand = $_POST['device_brand'];
    $device_serial = $_POST['device_serial_number'];
    $staff_assigned = $_POST['staff_assigned'];
    $staff_department = $_POST['staff_department'];
    $staff_office = $_POST['staff_office'];
    $staff_title = $_POST['staff_title'];
    $by = $_POST['assigned_by'];
    $date_assigned = $_POST['date_assigned'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Insert into computers table
    $query = "INSERT INTO scanners_printers (device_name, device_type, device_brand, device_serial_number, staff_assigned, staff_department, staff_office, staff_title, assigned_by, date_assigned, status, remarks) 
              VALUES ('$device_name',' $device_type','$device_brand','$device_serial' ,'$staff_assigned', '$staff_department', '$staff_office' ,'$staff_title', '$by', '$date_assigned', '$status', '$remarks')";

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Device Assigned Successfully!'); window.location.href='scanners.php';</script>";
    } else {
        echo "<script>alert('Error Assigning Device');</script>";
    }
}
?>
        <?php include('../generate_scan_qr.php'); ?>
        
