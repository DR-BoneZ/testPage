<?php include 'header.php'?>
   <div class="container target">
      <div class="row" style="padding-top: 10px;">
         <div class="col-sm-10">
            <h1>Contact Me</h1>
         </div>
         <div class="col-sm-2">
            <img class="pull-right img-circle" style="border-style: solid; border-width: 4px; border-color: #3c3c3c; width: 150px; height: 150px;" src="/img/profile.jpg">
         </div>
      </div>
      <?php include 'submit/contact.php'?>
      <div class="row" style="padding-top: 10px;">
         <div class="col-sm-1"></div>
         <div class="col-sm-10">
            <div class="panel panel-default">
               <div class="panel-heading">Contact</div>
               <div class="panel-body">
                  <form action="contact.php?submit=true" method="POST">
                     <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter email" required>
                     </div>
                     <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
                     </div>
                     <div class="form-group">
                        <label for="message">Message</label>
                        <textarea rows="10" cols="45" class="form-control" id="message" name="message" placeholder="Enter message" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-default">Submit</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-sm-1"></div>
      </div>
   </div>
<?php include 'footer.php'?>
