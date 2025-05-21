<?php
include 'nw_db_config.php';

if (isset($_GET['location_name'])) {
    $location_name = $_GET['location_name'];
    $result = mysqli_query($conn, "SELECT * FROM locations WHERE location_name = '$location_name'");
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location_name = $_POST['location_name'];
    $district = $_POST['district'];
    // ...get other fields...
    $sql = "UPDATE locations SET type='$location_name' WHERE location_name ='$location_name'";
    // Add other fields to the update query as needed
    mysqli_query($conn, $sql);
    header("Location: view_all_locations.php");
    exit();
}
?>

<form method="post">
    <input type="hidden" name="location_name" value="<?php echo $row['location_name']; ?>">
    District: <input type="text" name="district" value="<?php echo $row['district']; ?>"><br>
    <!-- Add other fields here -->
    <button type="submit">Update</button>
</form>