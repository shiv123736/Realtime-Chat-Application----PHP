<?php
   $message = $_POST["json"];
   $obj = json_decode($message);
   $name =  $obj->name;
   $msg =  $obj->message;
   $room = $obj->roomName;
   $ip = file_get_contents('https://api.ipify.org');
   //  echo "My public IP address is: " . $ip;

   include "db_connect.php";
   $sql = "INSERT INTO `message` (`roomName`, `name`, `message`, `ip`, `date`) VALUES ('$room', '$name', '$msg', '$ip', SYSDATE())";
   $result = $conn->query($sql);
   if($result == true) {
      echo 'Message Sent';
   }
   //enter name and lastname into your form and onclick they will be alerted 
?>