<h2>Viewing #<?php echo $image->id; ?></h2>

<p>
	<strong>Caption:</strong>
	<?php echo $image->caption; ?></p>
<p>
	<strong>Filepath:</strong>
	<?php echo $image->filepath; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $image->description; ?></p>

<?php echo Html::anchor('images/edit/'.$image->id, 'Edit'); ?> |
<?php echo Html::anchor('images', 'Back'); ?>