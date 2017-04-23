<?php
/**
 * Get available items and list down
 */
$items = getItems();

if (is_array($items)) {
    echo '<ul>';
    foreach ($items as $item) {
        echo '<li data-item-id="' . $item[0] . '">';
        echo $item[2];
        echo '<img src="' . $item[3] . '" class="md-trigger" data-modal="modal-18" alt="Image 1">';
        echo '</li>';
    }
    echo '</ul>';
}

function getItems()
{
    include 'config.php';
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM sales_item";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_all();
}