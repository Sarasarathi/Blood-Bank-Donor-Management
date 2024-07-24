<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == "delete") {
        $sql = "DELETE FROM donors WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Donor deleted successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Manage Donors</h2>
    <?php
    $sql = "SELECT * FROM donors";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Age: " . $row["age"]. " - Blood Group: " . $row["blood_group"]. " - Contact: " . $row["contact"]. "<br>";
            echo "<form method='post' action='admin.php'>
                    <input type='hidden' name='id' value='" . $row["id"]. "'>
                    <input type='hidden' name='action' value='delete'>
                    <input type='submit' value='Delete'>
                  </form>";
        }
    } else {
        echo "No donors found";
    }
    ?>
</body>
</html>
