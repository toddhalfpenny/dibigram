<h2>Editing Image</h2>
<br>

<?php echo render('images/_form'); ?>
<p>
	<?php echo Html::anchor('images/view/'.$image->id, 'View'); ?> |
	<?php echo Html::anchor('images', 'Back'); ?></p>
