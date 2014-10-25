<?php 
require_once("../inc/config.php");
require_once(ROOT_PATH . "inc/recipes-array.php");
$pageTitle = "Food Jumble | ";
$breadcrumb = "";
$page = "";
$recipes_per_page = 5;
$output = "";

// if displaying based on id, set recipe id, return correct recipe, and set title/breadcrumb
if(isset($_GET["id"])){
	$recipe_id = $_GET["id"];
	$recipe = array();
	// get as array to access individual parts of recipe
	// get_recipe returns as formatted string
	$recipe = get_recipe_as_array($recipe_id);
	$pageTitle .= $breadcrumb = $recipe["name"];
	$single_item = get_recipe($recipe_id, "key");
	$total_recipes = count($single_item);
}
// if displaying based on tags, set page title, page and breadcrumb
// also grab the array containing all elements to be displayed
elseif(isset($_GET["tag"])){
	$pageTitle .= $page = $breadcrumb = $_GET["tag"];
	$recipes_per_page = 3;
	$current_tags = get_recipe($page, "tags");
	$total_recipes = count($current_tags);
}
// if displaying based on search, set page title, page and breadcrumb
elseif(isset($search_term)){
	$pageTitle .= $page = $breadcrumb = "Search Results";
	$recipes_per_page = 5;
	$search_results = array();
	$current_terms = array("key","name","author","blurb","ingredients","tags");
	foreach($current_terms as $current_term){
		$these_results = get_recipe($search_term, $current_term);
		//var_dump($these_results);
		foreach($these_results as $result) {
			if(!in_array($result, $search_results)){
				$search_results[] = $result;
			}
		}
		// unset($these_results);
	}
	$total_recipes = count($search_results);
}
// otherwise, set to show all recipes
else{
$page = "allrecipes";
$pageTitle .= "All Recipes";
$breadcrumb = "All";
}

// set up pagination
if(!empty($_GET["pg"])) {
		$current_page = $_GET["pg"];
	}
	else {
		$current_page = 1;
	}
	$current_page = intval($current_page);

	if(!isset($total_recipes)){
		$total_recipes = get_recipe_count();
	}
	$number_pages = ceil($total_recipes / $recipes_per_page);

	if($current_page > $number_pages || $current_page < 1) {
		header("Location: ./?pg=1");
	}

	$start = (($current_page - 1) * $recipes_per_page) + 1;
	$end = $current_page * $recipes_per_page;
	if($end > $total_recipes){
		$end = $total_recipes;
	}
	
include(ROOT_PATH . 'inc/header.php'); ?>	
<div class="content-container">
<div class="breadcrumb"><a href="<?php echo BASE_URL; ?>recipes/">All Recipes</a> &gt; <?php echo $breadcrumb ?> </div>
<div class="border row">
<div class="small-12 small-centered inside-content">
<?php
if($number_pages > 1) {
		include(ROOT_PATH . "inc/pagination.html.php");
	}
// if displaying a single recipe, print it out
if(isset($recipe_id) && isset($single_item)){
	foreach($single_item as $recipe) {
		$output .= "<div class='recipe row'>";
		$output .= "<div class='recipe-content small-11 large-8 columns small-centered large-centered'>";
		$output .= "<div class='row'>";
		$output .= "<div class='small-6 columns'>";
		$output .= "<img class='img overlay' src='" . BASE_URL . $recipe["img"] . "' alt='" . $recipe["name"] . "' width='380px'>";
		$output .= "</div>";
		$output .= "<div class='small-6 columns'>";
		$output .= "<h3><a href='" . BASE_URL . "recipes/?id=" . $recipe["key"] . "'>" . $recipe["name"] . "</a></h3>";
		$output .= "<p>Submitted by: " . $recipe["author"] . "</p>";
		$output .= "<p>Prep Time: " . $recipe["preptime"] . "</p>";
		$output .= "<p>Servings: " . $recipe["servings"] . "</p>";
		$output .= "<p>" . $recipe["blurb"] . "</p></div></div>";
		$output .= "<div class='row'>";
		$output .= "<div class='small-6 columns'>";
		$output .= "<h5>Ingredients</h5><ul>";
		$ingredients = $recipe["ingredients"];
		foreach($ingredients as $ingredient){
			$output .= "<li>" . $ingredient . "</li>";
		}
		$output .= "</ul></div><div class='small-6 columns'>";
		$output .= "<h5>Directions</h5><ol>";
		$directions = $recipe["directions"];
		foreach($directions as $direction){
			$output .= "<li>" . $direction . "</li>";
		}
		$output .= "</ol><div class='tags'>Tags:";
		$tags = $recipe["tags"];
		foreach($tags as $tag){
			$output .= " <a href='" . BASE_URL . "recipes/?tag=" . $tag . "'>" . $tag . "</a> ";
		}
		$output .= "</div></div></div></div></div>";
	}
	echo $output;
}
// if displaying based on tags, grab all recipes that are tagged, and print them out
elseif(isset($current_tags)){
	$recipes = get_recipe_subset($current_tags,$start,$end);
	foreach($recipes as $recipe) {
		$output .= "<div class='recipe row'>";
		$output .= "<div class='recipe-content small-11 large-8 columns small-centered large-centered'>";
		$output .= "<div class='row'>";
		$output .= "<div class='small-6 columns'>";
		$output .= "<img class='img overlay' src='" . BASE_URL . $recipe["img"] . "' alt='" . $recipe["name"] . "' width='380px'>";
		$output .= "</div>";
		$output .= "<div class='small-6 columns'>";
		$output .= "<h3><a href='" . BASE_URL . "recipes/?id=" . $recipe["key"] . "'>" . $recipe["name"] . "</a></h3>";
		$output .= "<p>Submitted by: " . $recipe["author"] . "</p>";
		$output .= "<p>Prep Time: " . $recipe["preptime"] . "</p>";
		$output .= "<p>Servings: " . $recipe["servings"] . "</p>";
		$output .= "<p>" . $recipe["blurb"] . "</p></div></div>";
		$output .= "<div class='row'>";
		$output .= "<div class='small-6 columns'>";
		$output .= "<h5>Ingredients</h5><ul>";
		$ingredients = $recipe["ingredients"];
		foreach($ingredients as $ingredient){
			$output .= "<li>" . $ingredient . "</li>";
		}
		$output .= "</ul></div><div class='small-6 columns'>";
		$output .= "<h5>Directions</h5><ol>";
		$directions = $recipe["directions"];
		foreach($directions as $direction){
			$output .= "<li>" . $direction . "</li>";
		}
		$output .= "</ol><div class='tags'>Tags:";
		$tags = $recipe["tags"];
		foreach($tags as $tag){
			$output .= " <a href='" . BASE_URL . "recipes/?tag=" . $tag . "'>" . $tag . "</a> ";
		}
		$output .= "</div></div></div></div></div>";
	}
	echo $output;
}
// display search results
elseif(isset($search_term) AND $search_term != "") {
	if(isset($search_results)){
		foreach($search_results as $recipe) {
			//$thisItem = get_recipe_as_array($recipe["key"], "key");
			$output .= "<div class='recipe row'>";
			$output .= "<div class='recipe-preview small-11 large-8 columns small-centered large-centered'>";
			$output .= "<h3><a href='" . BASE_URL . "recipes/?id=" . $recipe["key"] . "'>" . $recipe["name"] . "</a></h3>";
			$output .= "<img class='img overlay' src='" . BASE_URL . $recipe["img"] . "' alt='" . $recipe["name"] . "' width='200px'>";
			$output .= "<p>" . $recipe["blurb"] . "</p>";
			$output .= "<div class='tags'>Tags:";
			$tags = $recipe["tags"];
				foreach($tags as $tag){
				$output .= " <a href='" . BASE_URL . "recipes/?tag=" . $tag . "'>" . $tag . "</a>";
			}
			$output .= "</div></div></div>";
		}
	}
	else{
		$output .= "<div class='row'>";
		$output .= "<div class='small-11 large-8 columns small-centered large-centered'>";
		$output .= "<h4>No Results Found</h4>";
		$output .= "<p>Looks like your search didn't return any results. Please modify your search terms and try again.</p>";
		$output .= "</div></div>";
	}
	echo $output;
}
else{
	$recipes = get_recipe_subset(get_all_recipes(),$start,$end);
	$thisItem = array();
	$output = "";
	foreach($recipes as $recipe) {
		$thisItem = get_recipe_as_array($recipe["key"], "key");
		$output .= "<div class='recipe row'>";
		$output .= "<div class='recipe-preview small-11 large-8 columns small-centered large-centered'>";
		$output .= "<h3><a href='" . BASE_URL . "recipes/?id=" . $recipe["key"] . "'>" . $recipe["name"] . "</a></h3>";
		$output .= "<img class='img overlay' src='" . BASE_URL . $recipe["img"] . "' alt='" . $recipe["name"] . "' width='200px'>";
		$output .= "<p>" . $recipe["blurb"] . "</p>";
		$output .= "<div class='tags'>Tags:";
		$tags = $recipe["tags"];
			foreach($tags as $tag){
			$output .= " <a href='" . BASE_URL . "recipes/?tag=" . $tag . "'>" . $tag . "</a>";
		}
		$output .= "</div></div></div>";
	}
	echo $output;
}
if($number_pages > 1) {
	include(ROOT_PATH . "inc/pagination.html.php");
}
?>
</div>
</div>
</div>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>