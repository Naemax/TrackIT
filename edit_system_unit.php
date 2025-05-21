<?php
include 'nw_db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM system_units WHERE device_id = '$id'");
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['device_id'];
    $CPU = $_POST['CPU'];
    // ...get other fields...
    $sql = "UPDATE system_units SET CPU='$cpu' WHERE device_id='$id'";
    // Add other fields to the update query as needed
    mysqli_query($conn, $sql);
    header("Location: viewallsystemunit.php");
    exit();
}
?>

<form method="post">
    <input type="hidden" name="device_id" value="<?php echo $row['device_id']; ?>">
    CPU: <input type="text" name="CPU" value="<?php echo $row['CPU']; ?>"><br>
    <!-- Add other fields here -->
    <button type="submit">Update</button>
</form>