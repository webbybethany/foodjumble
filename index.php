<?php 
require_once("/inc/config.php");
$pageTitle = "Epicurean Suggestions for Everyone";
$page = "index";
$status = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$status = "thanks";
}
include(ROOT_PATH . 'inc/header.php'); ?>	
	<div class="content-container" data-equalizer>
	<div class="row border">
		<div class="small-12 large-8 columns" id="home-slider" data-equalizer-watch>
		  <div class="slider responsive">
		  <div class="slide-item">
			  <a href="<?php echo BASE_URL . "recipes"; ?>">
			  <div class="caption inside-content"><h4>Spinach and Cheddar Crustless Quiche</h4></div>
			  <img class="img" src="<?php echo BASE_URL; ?>img/recipes/spinach-quiche.jpg" alt="Healthy Spinach Quiche" width="100%" />
			  </a>
			</div>
			<div class="slide-item">
			  <a href="<?php echo BASE_URL . "recipes"; ?>">
			  <div class="caption inside-content"><h4>Whole-Wheat Banana Walnut Bread</h4></div>
			  <img class="img" src="<?php echo BASE_URL; ?>img/recipes/banana-bread.jpg" alt="Yummy Banana Bread" width="100%" />
			  </a>
			 </div>
			<div class="slide-item">
			  <a href="<?php echo BASE_URL . "recipes"; ?>">
			  <div class="caption inside-content"><h4>Handmade Crab Cakes</h4></div>
			  <img class="img" src="<?php echo BASE_URL; ?>img/recipes/crab-cakes.jpg" alt="Delectable Crab Cakes" width="100%" />
			  </a>
			</div>
		  </div>
		</div>
		<div class="small-12 large-4 columns inside-content" id="home-sidebar" data-equalizer-watch>
			<div>
				<h3>Welcome!</h3>
				<p> We are glad you found Food Jumble and look forward to helping you plan your next meal. Check out the suggestions on the left to get started.</p>
			</div>
			<div>
			<?php if (isset($status) && $status == "thanks") { ?>
			<h3>Thanks for your Interest!</h3>
				<p>However, since this is a sample site, the newsletter is not live yet.</p>
			<?php } else { ?>
			<h3>Tips & Tricks in Your Inbox</h3>
			<p>Enter your name and email address below to get the newest recipes, time-saving tips, and more delivered straight to your inbox.</p>
			<form method="post" action="<?php echo BASE_URL; ?>index.php">
			<div class="row">
				<div class="small-8 columns small-centered">
					<input type="text" placeholder="Your Name" name="name" id="name" value="<?php if(isset($name)) {echo htmlspecialchars($name);} ?>" />
				</div>
			</div>
			<div class="row">
				<div class="small-8 columns small-centered">
					<input type="text" placeholder="email@mydomain.com" name="email" id="email" value="<?php if(isset($email)) {echo htmlspecialchars($email);} ?>" />
				</div>
			</div>
			<input type="hidden" name="address" />
			<div class="row">
			<div class="small-8 columns small-centered">
				<input type="submit" class="home-signup" value="Sign Me Up">
			</div>
			</div>
			</form>
			<?php } ?>
			</div>
		</div>
	</div>
	</div>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>