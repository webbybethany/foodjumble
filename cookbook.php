<?php 
require_once("/inc/config.php");
$pageTitle = "Food Jumble | Cookbook";
$page = "cookbook";
include(ROOT_PATH . 'inc/header.php'); ?>	
<div class="content-container">
	<div class="row border" data-equalizer>
		<div class="left-side small-6 columns">
		<div class="inside-content" data-equalizer-watch>
		<h2>What's Inside</h2>
			<p>Well readers, the day has finally come to launch our cookbook. Thank you for all the support along the way. We don't have a release date yet, but wanted to tell you a little bit about what to expect. Here's a little sneak peak of what you can expect.
				<ul>
					<li>An entire section dedicated to tips and tricks for cutting down the time it takes to make dinner.</li>
					<li>Over 50 brand new, never released recipes.</li>
					<li>Techniques for teaching your child to cook.</li>
					<li>And much more to come!</li>
				</ul>
			</p>
		</div>
		</div>
		<div class="right-side small-6 columns">
		<div class="inside-content" data-equalizer-watch>
			<h2>Help Us Name the Cookbook!</h2>
			<p>If you have naming ideas for the cookbook, <a href="<?php echo BASE_URL; ?>/contact.php">contact us</a> and let us know what your idea is.</p>
			<img class="img overlay" src="<?php echo BASE_URL; ?>img/cookbook-img.jpg"/>
		</div>
		</div>
	</div>
</div>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>