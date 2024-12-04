<?php
header('Content-Type: application/json');

// Database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "coffee_shop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed"]));
}

// Receive booking data
$data = json_decode(file_get_contents("php://input"), true);

$date = $conn->real_escape_string($data['date']);
$time = $conn->real_escape_string($data['time']);
$guests = $conn->real_escape_string($data['guests']);

// Check table availability
$sql = "SELECT COUNT(*) as available_tables 
        FROM tables 
        WHERE status = 'available' 
        AND max_capacity >= $guests 
        AND date = '$date' 
        AND time = '$time'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['available_tables'] > 0) {
    // Insert booking
    $insert_sql = "INSERT INTO bookings (date, time, guests) VALUES ('$date', '$time', $guests)";
    
    if ($conn->query($insert_sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Booking confirmed!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Booking failed"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "No tables available"]);
}

$conn->close();
?>