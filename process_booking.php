<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $guests = (int)$_POST['guests'];

    // Validate date and time
    $booking_datetime = strtotime($date . ' ' . $time);
    $current_datetime = time();
    
    if ($booking_datetime < $current_datetime) {
        die("Error: Booking time must be in the future");
    }

    // Check if the time slot is available
    $check_sql = "SELECT COUNT(*) as count FROM bookings 
                  WHERE booking_date = ? AND booking_time = ?";
    
    if ($stmt = mysqli_prepare($conn, $check_sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $date, $time);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        
        if ($row['count'] >= 5) { // Assuming max 5 tables per time slot
            die("Error: Selected time slot is fully booked");
        }
    }

    // Insert booking
    $sql = "INSERT INTO bookings (customer_name, email, phone, booking_date, booking_time, guests) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $phone, $date, $time, $guests);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='success-message'>Booking confirmed! We look forward to serving you.</div>";
            // In a real application, you would also send a confirmation email here
        } else {
            echo "<div class='error-message'>Error: Unable to process booking. Please try again.</div>";
        }
        
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);

// Redirect back to main page after 3 seconds
echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>";
?>
