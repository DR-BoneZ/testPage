<!-- File: app/View/Courses/view.ctp -->

<h1><?php echo h($course['Course']['title']); ?></h1>
<p>
    <small>Created: <?php echo $course['Course']['created']; ?></small>
    <?php if ($course['Course']['modified'] != null) echo '<br /><small>Modified: '.$course['Course']['modified'].'</small>';?>
</p>
<p><?php echo h($course['Course']['body']); ?></p>
