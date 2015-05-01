<?php
   error_reporting(0);
   if (array_key_exists('add', $_GET) && $_GET['add'] == 'true') {
      $conn = mysqli_connect('localhost', 'root', 'password');
      if (!$conn)
         die("Connection failed: ".mysqli_connect_error());
      $quarter = $_POST['quarter'];
      $courseID = strtoupper($_POST['courseID']);
      $courseTitle = $_POST['courseTitle'];
      $times = ($_POST['Mo'] ? 'M':'').($_POST['Tu'] ? 'Tu':'').($_POST['We'] ? 'W':'').($_POST['Th'] ? 'Th':'').($_POST['Fr'] ? 'F':'')." ".$_POST['startTime']." - ".$_POST['endTime'];
      $credits = $_POST['credits'];
      $sql = "INSERT INTO courses VALUES ('".$quarter."', '".$courseID."', '".$courseTitle."', '".$times."', ".$credits.");";
      mysqli_query($conn, "USE aiden_dev;");
      mysqli_query($conn, $sql);
      mysqli_close($conn);
   }
   if (array_key_exists('remove', $_POST)) {
      $conn = mysqli_connect('localhost', 'root', 'password');
      if (!$conn)
         die("Connection failed: ".mysqli_connect_error());
      $quarter = explode(":", $_POST['remove'])[0];
      $courseID = explode(":", $_POST['remove'])[1];
      $sql = "DELETE FROM courses WHERE quarter = '".$quarter."' AND courseID = '".$courseID."';";
      mysqli_query($conn, "USE aiden_dev;");
      mysqli_query($conn, $sql);
      mysqli_close($conn);
   }
?>
