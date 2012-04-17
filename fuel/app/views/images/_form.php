<?php echo Form::open(array('class' => 'form-stacked', 'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Caption', 'caption'); ?>

			<div class="input">
				<?php echo Form::input('caption', Input::post('caption', isset($image) ? $image->caption : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Filepath', 'filepath'); ?>

			<div class="input">
				<?php echo Form::file('filepath', array('class' => 'span6')); ?>

			</div>
		</div>



<?php
        $my_filters = Config::get('custom_config.filters');
        //Debug::dump($my_filters);


?>

        <div class="clearfix">
            <?php echo Form::label('Filters', 'filters'); ?>

            <div class="input">
                <?php echo Form::select('filter','',$my_filters); ?>

            </div>
        </div>






		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::input('description', Input::post('description', isset($image) ? $image->description : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>