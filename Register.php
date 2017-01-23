<?php
$conn=mysqli_connect("127.0.0.1", "root", "4719zmffjq", "andro");
mysqli_set_charset($conn, "ustf8");
$userID=$_POST["userID"];
$userPassword=$_POST["userPassword"];
$userName=$_POST["userName"];


$statement=mysqli_query($conn, "INSERT INTO USER VALUES (?, ?, ?)");
mysqli_stmt_bind_param($statement, "sss", $userID, $userPassword, $userName);
mysqli_stmt_execute($statement);

$response=array();
$response["success"]=true;
echo json_encode($response);
?>
