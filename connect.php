<?php
$fullname = $_POST['fullname'];
$date = $_POST['date'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(fullname, date, email, password)
    values(?, ?, ?, ?)");
    $stmt->bind_param("siss",$fullname, $date, $email, $password);
    $stmt->execute();
    echo "Registration Successfully....";
    $stmt->close();
    $conn->close();
}

?>