<?php
   if(isset($_GET['roomname'])) {
      $room = $_GET['roomname'];
   }
   include "db_connect.php";
   $sql = "select * from message where roomName = '$room'";
   $result = $conn->query($sql);
   if($result->num_rows > 0) {
      $data = array();
      while($row = $result->fetch_assoc()) {
         $data[] = $row;
      }
      echo json_encode($data);
   }
   else
      echo 'Nothing here';
?>
