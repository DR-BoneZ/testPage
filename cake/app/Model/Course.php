<?php
   class Course extends AppModel {
      public $validate = array(
//         'quarterID' => array('rule'=>'notEmpty'),
         'quarter' => array('rule'=>'notEmpty'),
         'courseID' => array('rule'=>'notEmpty'),
         'courseTitle' => array('rule'=>'notEmpty'),
         'times' => array('rule'=>'notEmpty'),
         'credits' => array('rule'=>'notEmpty'));
   }
?>
