<?php
require_once 'config.php';

// Fetch menu items grouped by category
$sql = "SELECT * FROM menu_items ORDER BY category, name";
$result = mysqli_query($conn, $sql);

$menu_items = array();
while($row = mysqli_fetch_assoc($result)) {
    $menu_items[$row['category']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Cozy Corner Café</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
            padding: 40px 0;
            background-color: #2c3e50;
            color: white;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .menu-section, .booking-section {
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .section-title {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .menu-category {
            margin: 30px 0;
        }

        .category-title {
            color: #34495e;
            font-size: 1.5em;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #eee;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: start;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .menu-item-details {
            flex: 1;
        }

        .menu-item-name {
            font-weight: bold;
            font-size: 1.1em;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .menu-item-description {
            color: #666;
            font-size: 0.9em;
            line-height: 1.4;
        }

        .menu-item-price {
            font-weight: bold;
            margin-left: 20px;
            color: #2c3e50;
            font-size: 1.1em;
        }

        .booking-form {
            display: grid;
            gap: 15px;
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }

        input, select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #2c3e50;
        }

        button {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #34495e;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            text-align: center;
        }

        .error-message {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .menu-item {
                flex-direction: column;
            }

            .menu-item-price {
                margin-left: 0;
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>The Cozy Corner Café</h1>
            <p>Your perfect spot for coffee and conversation</p>
        </div>
    </header>

    <div class="container">
        <!-- Menu Section -->
        <section class="menu-section">
            <h2 class="section-title">Our Menu</h2>
            <?php
            foreach($menu_items as $category => $items) {
                echo '<div class="menu-category">';
                echo '<h3 class="category-title">' . ucfirst($category) . '</h3>';
                
                foreach($items as $item) {
                    echo '<div class="menu-item">';
                    echo '<div class="menu-item-details">';
                    echo '<div class="menu-item-name">' . htmlspecialchars($item['name']) . '</div>';
                    echo '<div class="menu-item-description">' . htmlspecialchars($item['description']) . '</div>';
                    echo '</div>';
                    echo '<div class="menu-item-price">$' . number_format($item['price'], 2) . '</div>';
                    echo '</div>';
                }
                
                echo '</div>';
            }
            ?>
        </section>

        <!-- Booking Section -->
        <section class="booking-section">
            <h2 class="section-title">Book a Table</h2>
            <form class="booking-form" action="process_booking.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="time">Time:</label>
                    <select id="time" name="time" required>
                        <option value="">Select a time</option>
                        <?php
                        $start = strtotime('09:00');
                        $end = strtotime('14:30');
                        $interval = 30 * 60; // 30 minutes

                        for ($time = $start; $time <= $end; $time += $interval) {
                            echo '<option value="' . date('H:i', $time) . '">' . date('H:i', $time) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="guests">Number of Guests:</label>
                    <input type="number" id="guests" name="guests" min="1" max="8" required>
                </div>

                <button type="submit">Book Table</button>
            </form>
        </section>
    </div>
</body>
</html>