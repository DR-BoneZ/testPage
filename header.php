<html>
   <head>
      <title>Aiden McClelland</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/bootstrap-theme.css" />
      <script src="js/jquery-2.1.3.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <style>
         .deleteBtn {
            color: #CF3C3C;
            cursor: pointer;
         }
         .glyphicon-chevron-up, .glyphicon-chevron-down {
            cursor: pointer;
         }
      </style>
      <script>
         function deleteBtn (courseID, quarter) {
            $.ajax({
               url: "submit/classes.php",
               method: "POST",
               data: { "remove": quarter + ":" + courseID }
            }).error(function (jqxhrobj, errtype, exobj) {
               console.log("Error: " + errtype);
            }).success(function(data, code, jqxhrobj) {
               console.log("Success " + code + ": " + data);
            });
         }
      </script>
   </head>
   <body style="padding-top: 50px; padding-bottom: 73px">
      <nav class="navabar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" href="index.php">Aiden McClelland</a>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="<?php echo substr($_SERVER['REQUEST_URI'], 0, 10) == "/about.php" ? "active" : ""; ?>"><a href="about.php">About Me</a></li>
                  <li class="<?php echo substr($_SERVER['REQUEST_URI'], 0, 12) == "/classes.php" ? "active" : ""; ?>"><a href="classes.php">My Classes</a></li>
                  <li class="<?php echo substr($_SERVER['REQUEST_URI'], 0, 12) == "/contact.php" ? "active" : ""; ?>"><a href="contact.php">Contact</a></li>
               </ul>
            </div>
         </div>
      </nav>
