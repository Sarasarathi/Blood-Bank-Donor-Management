<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Donors</title>
</head>
<body>
    <h1>Search Donors</h1>
    <form method="post" action="search.php">
        Blood Group: <input type="text" name="blood_group"><br>
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $blood_group = $_POST['blood_group'];

        $sql = "SELECT * FROM donors WHERE blood_group='$blood_group'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Donors List</h2>";
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["name"]. " - Age: " . $row["age"]. " - Blood Group: " . $row["blood_group"]. " - Contact: " . $row["contact"]. "<br>";
            }
        } else {
            echo "No donors found";
        }
    }
    ?>
</body>
</html>
