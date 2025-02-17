<?php
include 'db_connection.php'; // Ensure you have database connection

require_once 'phpqrcode/qrlib.php'; // Include QR Code Library

// Function to generate and save QR code
function generateQRCode($device_serial, $device_type) {
    $qrDir = "qr_codes/"; // Folder to save QR codes
    if (!file_exists($qrDir)) {
        mkdir($qrDir, 0777, true); // Create directory if not exists
        
    }

    $fileName = $qrDir . $device_serial . ".png"; // QR code image file name
    $qrData = "Device: $device_type | Serial: $device_serial"; // QR data content

    QRcode::png($qrData, $fileName, QR_ECLEVEL_L, 4); // Generate QR Code

    return $fileName; // Return the file path
}

// Fetch all devices that don’t have a QR code yet
$sql = "SELECT device_id, device_serial_number, device_name FROM network_devices WHERE qr_code IS NULL";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $qrPath = generateQRCode($row['device_serial_number'], $row['device_name']); // Generate QR code

    // Store QR code path in database
    $updateSQL = "UPDATE network_devices SET qr_code = '$qrPath' WHERE device_id = " . $row['device_id'];
    $conn->query($updateSQL);
}

//echo "QR Codes Generated Successfully!";
?>
