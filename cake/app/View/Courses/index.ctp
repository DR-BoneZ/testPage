<!-- File: app/View/Courses/index.ctp -->

<h1>Courses</h1>
<?php echo $this->Html->link('Add Course', array('controller'=>'courses', 'action'=>'add')); ?>
<table>
     <tr>
          <th>Quarter</th>
          <th>Course ID</th>
          <th>Title</th>
          <th>Times</th>
          <th>Credits</th>
          <th>Actions</th>
     </tr>
     <?php foreach ($courses as $course): ?>
     <tr>
          <td><?php echo $course['Course']['quarter']; ?></td>
          <td><?php echo $course['Course']['courseID']; ?></td>
          <td><?php echo $course['Course']['courseTitle']; ?></td>
          <td><?php echo $course['Course']['times']; ?></td>
          <td><?php echo $course['Course']['credits']; ?></td>
          <td>
              <?php echo $this->Html->link('Edit', array('action'=>'edit', $course['Course']['courseID'], $course['Course']['quarter'])); ?> 
              <?php echo $this->Html->link('Delete', array('action'=>'delete', $course['Course']['courseID'], $course['Course']['quarter']), array('confirm'=>'Are you sure?')); ?>
          </td>
     </tr>
     <?php endforeach; ?>
     <?php unset($course); ?>
</table>
