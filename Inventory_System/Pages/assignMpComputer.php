

   <!-- 🔹 Bootstrap Modal (Pop-Up Form) -->

    <div class="modal fade" id="assignMpComputerModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignModalLabel">Assign Computer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="mp_computers.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Computer Name</label>
                            <select id="computer_name" name="computer_name" class="form-control" onchange="fillComputerDetails(this.value)">
                            <option value="">Select a Computer</option>
                            <?php
    include '../db_connection.php'; // Ensure you have a connection to MySQL
    $query = "SELECT equipment_name, equipment_serialNumber FROM equipment_received WHERE status = 'Available' AND equioment_type = 'Computer'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['equipment_name'] . '">' . $row['equipment_name'] . '</option>';
    }
    ?>
</select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Computer Type</label>
                            <select name="computer_type" required>
                                <option value="Desktop">Desktop</option>
                                <option value="Laptop">Laptop</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Computer Brand</label>
                            <input type="text" id="computer_brand" name="computer_brand" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" id="computer_serial_number" name="computer_serial_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Computer Level</label>
                            <select name="computer_level" required>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>                       
                         </div>
                        <div class="mb-3">
                            <label class="form-label">MP Assigned</label>
                            <input type="text" class="form-control" name="mp_assigned" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Constituency</label>
                            <select name="constituency" required>
                                <option value="Assin Central">Assin Central</option>
                                <option value="Asawase">Asawase</option>
                                <option value="Asokwa">Asokwa</option>
                                <option value="Efutu">Efutu</option>
                                <option value="Bole Bamboi">Bole Bamboi</option>
                                <option value="Tema Central">Tema Central</option>
                                <option value="Keta West">Keta West</option>
                                <option value="Nsawam-Adoagyire">Nsawam-Adoagyire</option>
                            </select>                          
                        </div>
                        <div class="mb-3">
                            <label class="form-label">MP Office</label>
                            <input type="text" class="form-control" name="mp_office" required>
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
    $computer_name = $_POST['computer_name'];
    $computer_type = $_POST['computer_type'];
    $computer_brand = $_POST['computer_brand'];
    $computer_level = $_POST['computer_level'];
    $computer_serial = $_POST['computer_serial_number'];
    $mp_assigned = $_POST['mp_assigned'];
    $constituency = $_POST['constituency'];
    $mp_office = $_POST['mp_office'];
    $by = $_POST['assigned_by'];
    $date_assigned = $_POST['date_assigned'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Insert into computers table
    $query = "INSERT INTO mp_computers (computer_name, computer_type, computer_brand, computer_level, computer_serial_number, mp_assigned, constituency, mp_office, assigned_by, date_assigned, status, remarks) 
              VALUES ('$computer_name',' $computer_type','$computer_brand', '$computer_level','$computer_serial' ,'$mp_assigned', '$constituency', '$mp_office', '$by', '$date_assigned', '$status', '$remarks')";

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Computer Assigned Successfully!'); window.location.href='mp_computers.php';</script>";
    } else {
        echo "<script>alert('Error Assigning Computer');</script>";
    }
}
?>
        <?php include('../generate_mp_qr.php'); ?>
        
