<?php include 'header.php'?>
   <div class="container target">
      <div class="row" style="padding-top: 10px;">
         <div class="col-sm-10">
            <h1>My Classes</h1>
         </div>
         <div class="col-sm-2 text-right"><h1></h1>
            <?php
               if (array_key_exists("edit", $_GET) && $_GET['edit'] == "true")
                  echo '<a class="btn btn-default" href="classes.php">Stop Editing</a>';
               else
                  echo '<a class="btn btn-default" href="classes.php?edit=true">Edit</a>';
            ?>
         </div>
      </div>
      <?php include 'submit/classes.php'?>
      <?php
         $conn = mysqli_connect('localhost', 'root', 'password', 'aiden_dev');
         if (!$conn)
            die("Connection Failed: ".mysqli_connect_error());
         function listQuarter($quarter, $conn) {
            $sql = "SELECT * FROM classes WHERE quarter = '".$quarter."' ORDER BY ".(array_key_exists('orderby', $_GET) ? $_GET['orderby'].', ' : '')."courseID ASC;";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
               echo '      <div class="row" style="padding-top: 5px;">
            <div class="col-sm-12">
               <div class="panel panel-default">
                  <div class="panel-heading">'.$quarter.'</div>
                  <table class="table">
                     <thead>
                        <tr>
                           '.(array_key_exists("edit", $_GET) && $_GET['edit'] == "true" ? '<th></th>' : '').'
                           <th>Course ID <span class="glyphicon glyphicon-chevron-up" onclick="location.replace(\'classes.php?orderby=courseID%20ASC\')"></span><span class="glyphicon glyphicon-chevron-down" onclick="location.replace(\'classes.php?orderby=courseID%20DESC\')"></span></th>
                           <th>Course Title <span class="glyphicon glyphicon-chevron-up" onclick="location.replace(\'classes.php?orderby=courseTitle%20ASC\')"></span><span class="glyphicon glyphicon-chevron-down" onclick="location.replace(\'classes.php?orderby=courseTitle%20DESC\')"></span></th>
                           <th>Times</th>
                           <th>Credits <span class="glyphicon glyphicon-chevron-up" onclick="location.replace(\'classes.php?orderby=credits%20ASC\')"></span><span class="glyphicon glyphicon-chevron-down" onclick="location.replace(\'classes.php?orderby=credits%20DESC\')"></span></th>
                        </tr>
                     </thead>
                     <tbody>';
               while ($row = $result->fetch_assoc()) {
                  echo '                        <tr>
                           '.(array_key_exists("edit", $_GET) && $_GET['edit'] == "true" ? '<td onclick="deleteBtn(\''.$row['courseID'].'\', \''.$quarter.'\')" class="deleteBtn"><span onclick="remove()">X</span></td>' : '').'
                           <td>'.$row['courseID'].'</td>
                           <td>'.$row['courseTitle'].'</td>
                           <td>'.$row['times'].'</td>
                           <td>'.$row['credits'].'</td>
                        </tr>';
               }
               echo '                     </tbody>
                  </table>
               </div>
            </div>
         </div>';
            }
         }
         $result = mysqli_query($conn, "SELECT quarter FROM classes WHERE quarter LIKE 'Senior Q%' ORDER BY quarter DESC;");
         if ($result->num_rows > 0) {
            $prevQuarter = '';
            while ($row = $result->fetch_assoc()) {
               if ($row['quarter'] != $prevQuarter)
                  listQuarter($row['quarter'], $conn);
               $prevQuarter = $row['quarter'];
            }
         }
         $result = mysqli_query($conn, "SELECT quarter FROM classes WHERE quarter LIKE 'Junior Q%' ORDER BY quarter DESC;");
         if ($result->num_rows > 0) {
            $prevQuarter = '';
            while ($row = $result->fetch_assoc()) {
               if ($row['quarter'] != $prevQuarter)
                  listQuarter($row['quarter'], $conn);
               $prevQuarter = $row['quarter'];
            }
         }
         $result = mysqli_query($conn, "SELECT quarter FROM classes WHERE quarter LIKE 'Sophomore Q%' ORDER BY quarter DESC;");
         if ($result->num_rows > 0) {
            $prevQuarter = '';
            while ($row = $result->fetch_assoc()) {
               if ($row['quarter'] != $prevQuarter)
                  listQuarter($row['quarter'], $conn);
               $prevQuarter = $row['quarter'];
            }
         }
         $result = mysqli_query($conn, "SELECT quarter FROM classes WHERE quarter LIKE 'Freshman Q%' ORDER BY quarter DESC;");
         if ($result->num_rows > 0) {
            $prevQuarter = '';
            while ($row = $result->fetch_assoc()) {
               if ($row['quarter'] != $prevQuarter)
                  listQuarter($row['quarter'], $conn);
               $prevQuarter = $row['quarter'];
            }
         }
      ?>
      <div class="row" style="padding-top: 10px; display: <?php echo !array_key_exists('edit', $_GET) || $_GET['edit'] != 'true' ? 'true' : 'none';?>;">
         <div class="col-sm-12">
            <div class="panel panel-default">
               <div class="panel-heading">Add Class</div>
               <div class="panel-body">
                  <form action="classes.php?add=true" method="POST">
                     <div class="form-group">
                        <label for="courseID">Course ID</label>
                        <input type="text" class="form-control" id="courseID" name="courseID" placeholder="Course ID" maxlength=9 required>
                     </div>
                     <div class="form-group">
                        <label for="courseTitle">Course Title</label>
                        <input type="text" class="form-control" id="courseTitle" name="courseTitle" placeholder="Course Title" required>
                     </div>
                     <div class="form-group">
                        <label for="quarter">Quarter</label>
                        <input type="text" class="form-control" id="quarter" name="quarter" placeholder="<year> Q#" maxlength=15 required>
                     </div>
                     <div class="form-group">
                        <fieldset>
                           <legend>Times</legend>
                           <label for="Mo">Mon</label>
                           <input type="checkbox" id="Mo" name="Mo">
                           <label for="Tu">Tue</label>
                           <input type="checkbox" id="Tu" name="Tu">
                           <label for="We">Wed</label>
                           <input type="checkbox" id="We" name="We">
                           <label for="Th">Thu</label>
                           <input type="checkbox" id="Th" name="Th">
                           <label for="Fr">Fri</label>
                           <input type="checkbox" id="Fr" name="Fr">
                           &nbsp;&nbsp;&nbsp;&nbsp;
                           <label for="startTime">Start</label>
                           <input type="text" id="startTime" name="startTime" placeholder="12:00am" maxlength=7 required>
                           <label for="endTime">End</label>
                           <input type="text" id="endTime" name="endTime" placeholder="12:00pm" maxlength=7 required>
                        </fieldset>
                     </div>
                     <div class="form-group">
                        <label for="credits">Credits</label>
                        <input type="number" class="form-control" id="credits" name="credits" placeholder="Enter credits" required>
                     </div>
                     <button type="submit" class="btn btn-default">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php include 'footer.php'?>
