<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
</head>
<body>

<div style="text-align:center">
	<img style="width: 250px;height: 150px;" src="<?php echo base_url('resource/images/06894dbc09ceb8dbbbaa4a2bdeac722e_b.jpg')?>" alt="">
	<p><?php echo $content; ?></p>
	<h1>Hello World 啊喂！~</h1>
</div>
	<?php echo js('jquery.min.js') ?>
</body>
</html> -->

<?php view('header'); ?>
<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>welcome</h1>
		</div>
	</div>
<?php view('footer'); ?>

