<!-- File: app/View/Courses/edit.ctp -->

<h1>Edit Course</h1>
<?php
   echo $this->Form->create('Course');
   echo $this->Form->input('quarter');
   echo $this->Form->input('courseID');
   echo $this->Form->input('courseTitle');
   echo $this->Form->input('times');
   echo $this->Form->input('credits');
   echo $this->Form->input('quarterID', array('type'=>'hidden'));
   echo $this->Form->end('Save Course');
?>
