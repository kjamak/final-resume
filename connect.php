<?php
$username = filter_input(INPUT_POST, 'name');
$surname = filter_input(INPUT_POST, 'surname');
$email = filter_input(INPUT_POST, 'email');
$country = filter_input(INPUT_POST, 'country');
$gender = filter_input(INPUT_POST, 'gender');
$message = filter_input(INPUT_POST, 'message');


if (!empty($username)){
if (!empty($surname)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "resumeformdb";


$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO requests (name, surname, email, gender, country, message)
values ('$username','$surname', '$email' , '$gender' , '$country' , '$message')";
if ($conn->query($sql)){
header('Location: sucessfull.html');}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>