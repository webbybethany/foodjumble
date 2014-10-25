<?php 
$search_term = "";
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name="description" content="Healthy and simple meals for busy people.">
	<meta name="keywords" content="healthy, simple, quick meals">
	<meta name="author" content="www.ariawebservices.com">
    <title><?php echo $pageTitle; ?></title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Acme|Ribeye+Marrow' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/foundation.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>slick/slick.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/main.css" />
	
	<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements and feature detects -->
    <script src="<?php echo BASE_URL; ?>js/vendor/modernizr.js"></script>
	
	<meta charset="utf-8">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  </head>
  <body>
    <div class="header-container">
		<a href="<?php echo BASE_URL; ?>"><div id="site-header">
		<div><img src="<?php echo BASE_URL . "img/food-jumble-logo.png";?>" alt="Jumble of Fruit" width="180px"></div>
		<div><h1>Food Jumble</h1><h3>Epicurean Suggestions for Everyone</h3></div>
		</div></a>
		<div class="row">
		<nav class="sticky top-bar small-10 columns small-centered" data-topbar>
			<div class="top-bar-section">
				<ul class="left">
				<li <?php if($page == "index") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>">Home</a></li>
				<li class="has-dropdown <?php if($page == "allrecipes") {echo 'active';} ?>"><a href="<?php echo BASE_URL; ?>recipes/">All Recipes</a>
					<ul class="dropdown">
						<li <?php if($page == "top") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>recipes/?tag=top">Top Recipes</a></li>
						<li <?php if($page == "under45") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>recipes/?tag=under45">Under 45 Minutes</a></li>
						<li <?php if($page == "datenight") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>recipes/?tag=datenight">Date Night</a></li>
					</ul>
					</li>
				<li <?php if($page == "cookbook") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>cookbook/">Order the Cookbook</a></li>
				<li <?php if($page == "about") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>about/">About</a></li>
				<li <?php if($page == "contact") {echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>contact/">Contact</a></li>
					<!-- <li class="has-form">
					<div class="row collapse">
						<div class="large-8 small-9 columns">
						<form method="get" action="<?php echo BASE_URL; ?>recipes/?searchterm=<?php if(isset($_GET["searchterm"]) AND $_GET["searchterm"] != $search_term) {$search_term = $_GET["searchterm"]; echo htmlspecialchars($search_term);} ?>">
						  <input type="text" placeholder="Find your recipe" name="searchterm" id="searchterm" value="<?php if(isset($search_term)) {echo htmlspecialchars($search_term);} ?>">
						</div>
						<div class="large-4 small-3 columns">
							<input class="alert button expand" type="submit" value="Search">
						</div>
						</form>
					 </div> 
					</li> -->
				</ul>
			</div>				
		</nav>
		</div>
	</div>