<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

session_start();
$SDID=$_SESSION["id"] ;

$conn = new mysqli("127.0.0.1", "root", "", "chaochao");
$result = $conn->query("SELECT * FROM product");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"detail":"'   . $rs["CourseType"]        . '",';
    $outp .= '"price":"'. $rs["price"]     . '"}';
    Header("Location: mainPage-3.html");
}
$outp .="]";
$conn->close();
echo($outp);


?>
