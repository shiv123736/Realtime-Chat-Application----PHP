<?php
//create room 
$roomName = $password = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["roomName"])) {
        include "db_connect.php";
        $roomName = test_input($_POST['roomName']);
        // $password = test_input($_POST['password']);
        $sql = "select * from rooms where roomName = '$roomName'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo '<script>';
            echo 'alert("Group already Exists.");';
            echo 'window.location="http://localhost/shivi/RealtimeChat_webApp/index.php";';
            echo '</script>'; 
            // header('location: index.php?roomExists');
            exit();
        }
        $sql = "INSERT INTO `rooms` (`roomName`,`date`) VALUES ('$roomName', SYSDATE())";
        $result = $conn->query($sql);
        if($result == true) {
            header("location: roomMsg.php?roomname=$roomName");
        }
        else 
            header('location: index.php?failed');
    }
    else 
        header("location: index.php?fill the fields");
}
else {
    header("location: index.php?error");
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>