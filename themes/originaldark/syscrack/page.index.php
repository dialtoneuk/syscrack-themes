<?php
	use Framework\Application\Render;
?>
<html>
	<?php
		Render::view('syscrack/templates/template.header' );
	?>
	<body>
		<div class="container">
			<?php
				Render::view('syscrack/templates/template.navigation');
				Render::view('syscrack/templates/template.errors');
			?>
		</div>
		<div class="jumbotron fullscreen" style="padding: 0; background-color: transparent;">
			<div class="embed-responsive embed-responsive-16by9 text-center">
				<video class="embed-responsive-item" loop autoplay style="z-index: -1;" src="https://files.catbox.moe/wty1aq.mp4"></video>
				<section id="info" style="padding-top: 16%">
					<h3 style="font-size: 12em;">Syscrack <span class="label label-default">2</span></h3>
					<h2>Virtual Online Crime Simulator</h2>
					<h3>
						<span class="glyphicon glyphicon-hdd"></span> <a href="<?=$settings["github_main"]?>">Github</a>
						<span class="glyphicon glyphicon-globe"></span> <a href="<?=$settings["discord_main"]?>">Discord</a>
					</h3>
				</section>
			</div>
		</div>
		<div class="container" style="margin-top: 16px;">
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<img src="<?=@$assets["img"][0]?>" alt="...">
						<div class="caption text-center">
							<h3>Hack Stuff</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<img src="<?=@$assets["img"][1]?>" alt="...">
						<div class="caption text-center">
							<h3>Capitalize</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<img src="<?=@$assets["img"][2]?>" alt="...">
						<div class="caption text-center">
							<h3>Research</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<img src="<?=@$assets["img"][3]?>" alt="...">
						<div class="caption text-center">
							<h3>Network</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-offset-2">
						<h2>
							Join thousands of players in the worlds largest hacking simulator.
						</h2>
						<p>
							<button type="button" class="btn btn-info btn-lg" onclick="window.location.href = '/register'">Signup</button>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
				Render::view('syscrack/templates/template.footer',  array('breadcrumb' => true) );
			?>
		</div>
	</body>
</html>
