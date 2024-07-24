<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donor_id = $_POST['donor_id'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $sql = "INSERT INTO donations (donor_id, quantity, date) VALUES ('$donor_id', '$quantity', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Blood donation record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blood Donation</title>
</head>
<body>
    <h1>Add Blood Donation</h1>
    <form method="post" action="add_donation.php">
        Donor ID: <input type="text" name="donor_id"><br>
        Quantity (ml): <input type="text" name="quantity"><br>
        Date: <input type="date" name="date"><br>
        <input type="submit" value="Add Donation">
    </form>
</body>
</html>
