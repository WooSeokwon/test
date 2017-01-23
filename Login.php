<?php
$conn=mysqli_connect("127.0.0.1", "root", "4719zmffjq", "andro");
mysqli_set_charset($conn, "ustf8");
$userID = $_POST["userID"];
$userPassword = $_POST["userPassword"];

//DB에 입력한 아이디와 비밀번호가 존재하는지 확인
$statement = mysqli_query($conn, "SELECT * FROM USER WHERE userID=? AND userPassword=?");
mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $userPassword, $userName);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
    $response["success"] = true;
    $response["userID"]=$userID;
    $response["userPassword"]=$userPassword;
    $response["userName"]=$userName;
}
echo json_encode($response);
 ?>
