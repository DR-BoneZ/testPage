<?php
   if (array_key_exists('submit', $_GET) && $_GET['submit'] == "true") {
      $success = mail("Aiden McClelland <aidenm@jabico.com>", $_POST['subject'], $_POST['message'], "From: ".$_POST['emailAddress']);
      if ($success) {
         echo '<div style="padding-top: 10px;"><ul class="list-group"><li class="list-group-item text-center" style="background-color: #dff0d8;">Message Sent</li></ul></div>';
      }
      else {
         echo '<div style="padding-top: 10px;"><ul class="list-group"><li class="list-group-item text-center" style="background-color: #f2dede;">Message failed to send!</li></ul></div>';
      }
   }
?>
