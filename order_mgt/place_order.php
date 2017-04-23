<?php
/**
 * Post data from order form
 */
if (isset($_POST) && is_array($_POST)) {

    $orderItem = $_POST['item_id'];
    $qty = $_POST['qty'];
    $customerName = $_POST['customer_name'];
    saveOrder($orderItem, $qty, $customerName);

} else {
    echo "Invalid Post Data";
}

function saveOrder($orderItem, $qty, $customerName)
{
    include 'config.php';
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    $sql="INSERT INTO `sales_order` (`item_id`, `qty`, `customer`) VALUES ($orderItem, $qty, $customerName)";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

}