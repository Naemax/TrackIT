<?php
include 'nw_db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    // ...get other fields...
    $sql = "UPDATE users SET id='$type' WHERE id='$id'";
    // Add other fields to the update query as needed
    mysqli_query($conn, $sql);
    header("Location: users.php");
    exit();
}
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    ID: <input type="text" name="id" value="<?php echo $row['id']; ?>"><br>
    <!-- Add other fields here -->
    <button type="submit">Update</button>
</form>