<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('custom.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">


            <div class="page-header">
                <h1><?php echo $title; ?></h1>
            </div>



<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>




<?php echo $content; ?>



		<footer>
			<!--<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>-->
			<p>
				FuelPHP Dibi Workshop
			</p>
		</footer>
	</div>
</body>
</html>
