<h2>Listing Images</h2>
<br>
<?php if ($images): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Caption</th>
			<th>Filepath</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($images as $image): ?>		<tr>

			<td><?php echo $image->caption; ?></td>
			<td><?php echo $image->filepath; ?></td>
			<td><?php echo $image->description; ?></td>
			<td>
				<?php echo Html::anchor('images/view/'.$image->id, 'View'); ?> |
				<?php echo Html::anchor('images/edit/'.$image->id, 'Edit'); ?> |
				<?php echo Html::anchor('images/delete/'.$image->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Images.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('images/create', 'Add new Image', array('class' => 'btn success')); ?>

</p>
