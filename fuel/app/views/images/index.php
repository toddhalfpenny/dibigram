<h2>Listing Images</h2>
<br>
<?php if ($images): ?>


        <ul class="thumbnails">
<?php foreach ($images as $image): ?>


        <li class="span3">
            <div class="thumbnail">

                <img class="filter-<?php echo $image->filter; ?>" src="<?php echo 'http://dibifuel.local/uploads';?>/<?php echo $image->filepath; ?>" width="260px" height="180"/>
                <h5><?php echo $image->caption; ?></h5>
                <p><?php echo $image->description; ?></p>

                <p>
                    <?php echo Html::anchor('images/view/'.$image->id, 'View', array('class' => 'btn btn-primary')); ?>


                </p>



            </div>
        </li>









				<?php //echo Html::anchor('images/edit/'.$image->id, 'Edit'); ?>
				<?php //echo Html::anchor('images/delete/'.$image->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>



<?php endforeach; ?>

    </ul>
    <hr />

<?php else: ?>
<p>No Images.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('images/create', 'Add new Image', array('class' => 'btn success')); ?>

</p>
