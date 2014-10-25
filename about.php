<?php 
require_once("/inc/config.php");
$pageTitle = "About";
$page = "about";
include(ROOT_PATH . 'inc/header.php'); ?>	
<div class="content-container">
<div class="row border" data-equalizer>
<div class="small-12 columns inside-content"><h2>Get to Know the Team</h2></div>
<div id="about" class="inside-content large-6 small-12 columns " data-equalizer-watch>
	<p>Thanks for stopping by Food Jumble. This site is the brain child of a pair of foodies that wanted to share their love of food with others. We are Brian and Becky Johnson and we firmly believe that everyone should be able to cook some simple healthy meals for themselves and their families.</p>
	<p>While we aren't experts, we have both been cooking for many years and through our experiments (both successful and not successful), we have learned a lot about the <a href="<?php echo BASE_URL; ?>recipes/">best ways to do things</a>, what to do when you are <a href="<?php echo BASE_URL; ?>recipes/?tag=top">out of ideas</a>, and of course, some delicious recipes for <a href="<?php echo BASE_URL; ?>recipes/?tag=datenight">date night</a>!</p>
	<p>Please take a look around. We hope you enjoy the site and learn something new. If you have a question, you can always <a href="<?php echo BASE_URL; ?>contact.php">drop us a line</a> and if you have a recipe to share, we would love to try it out and then post it for others to use.</p>
</div>
<div id="strawberries" class="inside-content large-6 small-12 columns " data-equalizer-watch><a href="<?php echo BASE_URL; ?>recipes/?tag=top"><img class="img overlay" src="<?php echo BASE_URL . 'img/fresh-strawberries.jpg'; ?>" alt="Fresh Strawberries" width="90%" ></a>
	</div>
</div>
</div>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>