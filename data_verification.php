<?php 
include('connection.php');

$data = !empty($_POST['data']) ? $_POST['data'] : '';
$date=date('Y-m-d');
if(mysqli_num_rows($result = $conn->query("SELECT * FROM Table1 WHERE `data` = '$data'"))>0){
    $result = $conn->query("UPDATE `Table1` SET `date` = '$date' WHERE `data` = '$data';");
}
else{
    $result = $conn->query("INSERT INTO `Table1` (`id`, `date`, `data`) VALUES (NULL, '$date' , '$data');");
}
$result = $conn->query("SELECT * FROM Table1");

if (!$result) {
   echo 'error';
    exit;
}
echo mysqli_num_rows($result);
mysqli_close($conn);
?>