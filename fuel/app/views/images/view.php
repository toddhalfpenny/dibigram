<h2><?php echo $image->caption; ?></h2>



    <img class="filter-<?php echo $image->filter; ?>" src="<?php echo 'http://dibifuel.local/uploads';?>/<?php echo $image->filepath; ?>" width="350px" height="250"/>


<p>
	<strong>Description:</strong>
	<?php echo $image->description; ?></p>

<?php echo Html::anchor('images/edit/'.$image->id, 'Edit'); ?> |
<?php echo Html::anchor('images', 'Back'); ?>