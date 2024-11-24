<?php
require_once 'config.php';

// Fetch menu items grouped by category
$sql = "SELECT * FROM menu_items ORDER BY category, name";
$result = mysqli_query($conn, $sql);

$menu_items = array();
while($row = mysqli_fetch_assoc($result)) {
    $menu_items[$row['category']][] = $row;
}

// Display menu items
foreach($menu_items as $category => $items) {
    echo '<div class="menu-category">';
    echo '<h3>' . ucfirst($category) . '</h3>';
    
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

mysqli_close($conn);
?>
