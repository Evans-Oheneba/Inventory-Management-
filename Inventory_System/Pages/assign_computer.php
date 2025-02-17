
    <!-- 🔹 Bootstrap Modal (Pop-Up Form) -->
    <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignModalLabel">Receive Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="stock.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Equipment Name</label>
                            <input type="text" class="form-control" name="equipment_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Equipment Type</label>
                            <select class="form-select" name="equipment_type" required>
                                <option value="Computer">Computer</option>
                                <option value="Scanner/Printer">Scanner/Printer</option>
                                <option value="Network Device">Network Device</option>
                                <option value="Accessories">Accessores</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Equipment Brand</label>
                            <input type="text" class="form-control" name="equipment_brand" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="equipment_serial" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Equipment Level</label>
                            <select class="form-select" name="equipment_level" required>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>                       
                         </div>
                        <div class="mb-3">
                            <label class="form-label">Date Received</label>
                            <input type="date" class="form-control" name="date_received" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Received From</label>
                            <input type="text" class="form-control" name="received_from" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Received By</label>
                            <input type="text" class="form-control" name="received_by" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Available">Available</option>
                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <input type="text" class="form-control" name="remark" required>
                        </div>
                        <button type="submit" class="btn btn-success">Receive Device</button>
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
    $equipment_name = $_POST['equipment_name'];
    $equipment_type = $_POST['equipment_type'];
    $equipment_brand = $_POST['equipment_brand'];
    $equipment_level = $_POST['equipment_level'];
    $equipment_serial = $_POST['equipment_serial'];
    $date_received = $_POST['date_received'];
    $from = $_POST['received_from'];
    $by = $_POST['received_by'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    // Insert into computers table
    $query = "INSERT INTO equipment_received (Equipment_name, Equioment_type, Equipment_brand, Equipment_serialNumber, Equipment_level, Date_received, Received_from, Received_by, Status, Remark) 
              VALUES ('$equipment_name','$equipment_type','$equipment_brand', '$equipment_serial','$equipment_level' ,'$date_received', '$from', '$by', '$status', '$remark')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Device Received Successfully from!'); window.location.href='stock.php';</script>";
    } else {
        echo "<script>alert('Error Receiving Device');</script>";
    }
}
?>
