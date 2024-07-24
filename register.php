<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO donors (name, age, blood_group, contact) VALUES ('$name', '$age', '$blood_group', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "New donor registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register as Donor</title>
</head>
<body>
    <h1>Register as Donor</h1>
    <form method="post" action="register.php">
        Name: <input type="text" name="name"><br>
        Age: <input type="text" name="age"><br>
        Blood Group: <input type="text" name="blood_group"><br>
        Contact: <input type="text" name="contact"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
