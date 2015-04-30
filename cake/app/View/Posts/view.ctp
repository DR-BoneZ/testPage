<!-- File: app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>
<p>
    <small>Created: <?php echo $post['Post']['created']; ?></small>
    <?php if ($post['Post']['modified'] != null) echo '<br /><small>Modified: '.$post['Post']['modified'].'</small>';?>
</p>
<p><?php echo h($post['Post']['body']); ?></p>
