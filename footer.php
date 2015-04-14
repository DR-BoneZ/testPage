      <nav class="navbar navbar-default navbar-fixed-bottom">
         <div class="container-fluid">
            <ol class="breadcrumb" style="text-align: center; margin: 0px;">
               <li class="<?php echo $_SERVER['REQUEST_URI'] == "/index.php" ? "active" : ""; ?>"><a href="index.php">Home</a></li>
               <li class="<?php echo $_SERVER['REQUEST_URI'] == "/about.php" ? "active" : ""; ?>"><a href="about.php">About Me</a></li>
               <li class="<?php echo $_SERVER['REQUEST_URI'] == "/classes.php" ? "active" : ""; ?>"><a href="classes.php">My Classes</a></li>
               <li class="<?php echo $_SERVER['REQUEST_URI'] == "/contact.php" ? "active" : ""; ?>"><a href="contact.php">Contact</a></li>
            </ol>
            <ol class="breadcrumb" style="text-align: center; margin: 0px;">
               <li class="active">Copyright &copy 2015, Aiden McClelland</li>
            </ol>
         </div>
      </nav>
   </body>
</html>
