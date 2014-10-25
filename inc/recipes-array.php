<?php

// count number of recipes in the recipes array
function get_recipe_count() {
$all = get_all_recipes();
return count($all);
}

// takes a key as $arg1 and returns the recipe as an array.
function get_recipe_as_array($arg1){
	$recipe = array();
	$items = get_all_recipes();
	foreach ($items as $key => $item) {
		if($arg1 == $item["key"]) {
			$recipe = $item;
		}
	}
	return $recipe;
}

// takes value to search for as $arg1, takes what the key name is as $arg2
// returns formatted recipe as a string
function get_recipe($arg1, $arg2) {
	$these_recipes = array();
	$output = "";
	$items = get_all_recipes();
	foreach ($items as $key => $item) {
		if(($arg1 === $item[$arg2] OR (is_array($item[$arg2]) AND in_array($arg1, $item[$arg2]))) AND (!in_array($item, $these_recipes))) {
			$these_recipes[] = $item;
		}
	}
	return $these_recipes;
}

function get_recent_recipes($arg1) {
	$allOutput = "";
	$all = get_all_recipes();
	for($i = 0; $i < $arg1; $i++) { 
		$thisItem = end($all); 
		array_pop($all);
		$allOutput .= get_recipe($thisItem["key"]);
	 }
}

function get_recipe_subset($array,$start,$end){
	$subset = array();
	$all = $array;
	$position = 0;
	
	foreach($all as $recipe){
		$position += 1;
		if($position >= $start && $position <= $end){
		$subset[] = $recipe;
		}
	}
	return $subset;
}

function get_all_recipes(){
	$recipes = array();
	$recipes[] = array(
		"key" => 101,
		"name" => "Post-Workout Smoothie",
		"img" => "img/recipes/smoothie.jpg",
		"author" => "Bethany Hernandez",
		"submission-date" => "2014-06-13",
		"blurb" => "I came up with this smoothie because I found that after going running, I was always really hungry. This is quick, healthy, and low calorie.",
		"ingredients" => array(
			"1 ripe banana",
			"1 TBSP unsweetened cocoa",
			"1 TBSP peanut butter",
			"1/2 TBSP honey",
			"3/4 cup unsweetened almond milk",
			"1 big handful baby spinach"
		),
		"preptime" => "5 minutes",
		"servings" => "1",
		"directions" => array(
			"Break banana into chunks.",
			"Place all ingredients in blender.",
			"Blend until well-mixed."
		),
		"tags" => array(
			"top",
			"under45",
			"healthy",
			"snacks",
			"fruit"
		)
		
	);

	$recipes[] = array(
		"key" => 102,
		"name" => "Semi-Whole Wheat Banana Bread",
		"img" => "img/recipes/banana-bread.jpg",
		"author" => "Suzy Q",
		"submission-date" => "2014-05-11",
		"blurb" => "This banana bread recipe is moist and yummy, made with healthy ingredients so you don't feel bad about eating it. If you have extra bananas lying around, give this recipe a try.",
		"ingredients" => array(
			"1/2 cup butter",
			"1/2 cup brown sugar",
			"2 eggs, beaten",
			"4 bananas, finely crushed",
			"3/4 cup white flour",
			"3/4 cup whole-wheat flour",
			"1 tsp baking soda",
			"1/2 tsp salt",
			"1/2 tsp vanilla",
			"1/4 cup unsweetened almond milk"
		),
		"preptime" => "60 minutes",
		"servings" => "10 (1 loaf)",
		"directions" => array(
			"Cream together butter and sugar.",
			"Add eggs, milk and crushed bananas.",
			"Combine well.",
			"Sift together flour, soda and salt. Add to creamed mixture. Add vanilla",
			"Pour into greased and floured loaf pan.",
			"Bake at 350 degrees for 60 minutes."
		),
		"tags" => array(
			"healthy",
			"top"
		)	
	);

	$recipes[] = array(
		"key" => 103,
		"name" => "Ropa Vieja",
		"img" => "img/recipes/ropa-vieja.jpg",
		"author" => "Anonymous",
		"submission-date" => "2014-06-22",
		"blurb" => "Simple, delicious and unpretentious. This dish is sure to be a weekday hit and adding rice or tortilla chips quickly makes it a full meal.",
		"ingredients" => array(
			"1 1/2 flank steaks",
			"1/2 large green pepper (diced)",
			"1 medium onion (diced)",
			"6 garlic cloves (diced)",
			"1 14oz can diced tomatoes",
			"1 cup white wine",
			"2-3 bay leaves",
			"1 tsp cumin",
			"oregano to taste",
			"olive oil",
			"salt and pepper"
		),
		"preptime" => "60 minutes",
		"servings" => "6",
		"directions" => array(
			"Boil flank steak with bay leaves, salt, and oregano until tender, setting broth aside.",
			"Set steak aside to cool.",
			"Saute onions, garlic, and green peppers until tender.",
			"Tear steak into strings until it looks shredded.",
			"Add steak and cumin, saute 5-10 minutes.",
			"Add tomatoes and cook 20 minutes.",
			"Add wine and cook until reduced a little. If reduced too much, add broth to get desired consistency.",
			"Serve over rice or use in tortillas."
		),
		"tags" => array(
			"latin",
			"healthy",
			"top"
		)
	);

	$recipes[] = array(
		"key" => 104,
		"name" => "Broccoli Casserole",
		"img" => "img/recipes/broccoli-casserole.jpg",
		"author" => "Anonymous",
		"submission-date" => "2014-06-30",
		"blurb" => "A recipe for holidays and special occassions, this rich recipe will give you a whole new perspective on broccoli.",
		"ingredients" => array(
			"2 boxes chopped broccoli",
			"1 stick margarine/butter",
			"1/2 lb. Velveeta cheese (cubed)",
			"1/4 lb. crushed Ritz crackers"
		),
		"preptime" => "40 minutes",
		"servings" => "8",
		"directions" => array(
			"Cook broccoli in boiling salted water for 5 minutes.",
			"Drain partially, leaving at least 1/2 cup liquid.",
			"Add cheese and 1/2 stick of butter.",
			"Stir until smooth and transfer to casserole dish.",
			"Melt other 1/2 stick of butter.",
			"Add crackers to butter and stir together.",
			"Spread cracker mixture over broccoli.",
			"Bake at 350 degrees for 20-30 minutes."
		),
		"tags" => array(
			"top",
			"datenight",
			"under45",
			"vegetables"
		)	
	);

	$recipes[] = array(
		"key" => 105,
		"name" => "Crab Cakes",
		"img" => "img/recipes/crab-cakes.jpg",
		"author" => "Anonymous",
		"submission-date" => "2014-04-04",
		"blurb" => "I love crab cakes and these oven-baked ones are my favorite recipe. Pair with some white wine and a squeeze of lemon juice.",
		"ingredients" => array(
			"1 lb. lump crab, picked through for shells",
			"2 scallions, diced",
			"1/4 cup diced red bell pepper",
			"1/4 cup diced green bell pepper",
			"1 egg",
			"1 tsp Worcestershire sauce",
			"2 tsp Dijon mustard",
			"1 tbsp fresh squeezed lemon juice",
			"1/4 tsp garlic powder",
			"1 tsp salt",
			"dash cayenne pepper",
			"3/4 cup bread crumbs",
			"pepper to taste"
		),
		"preptime" => "60 minutes",
		"servings" => "4",
		"directions" => array(
			"Preheat oven to 400 degrees and grease baking sheet.",
			"Set aside 1/2 cup bread crumbs in a bowl.",
			"Mix all remaining ingredients together in a bowl.",
			"Form mixture into 8 patties.",
			"Coat each patty in bread crumbs and place on baking sheet.",
			"Bake 10 minutes, until bottom is golden brown.",
			"Flip cakes and cook additional 5-10 minutes until bottom is golden brown."
		),
		"tags" => array(
			"top",
			"datenight",
			"healthy"
		)
	);

	$recipes[] = array(
		"key" => 106,
		"name" => "Everyday Spinach Quiche",
		"img" => "img/recipes/spinach-quiche.jpg",
		"author" => "Anonymous",
		"submission-date" => "2014-07-10",
		"blurb" => "My favorite way to eat spinach. Cheddar, veggies and white wine make this a yummy breakfast or snack that you will want to make every week.",
		"ingredients" => array(
			"1 tbsp vegetable oil",
			"1 onion, chopped",
			"1 box fresh baby spinach",
			"white wine to taste",
			"6 eggs, beaten",
			"1 1/2 cups shredded cheddar cheese",
			"1 scallion, chopped",
			"1 tomato, sliced into slices",
			"3-4 cloves garlic",
			"1/4 tsp salt",
			"1/4 tsp black pepper"
		),
		"preptime" => "50 minutes",
		"servings" => "6",
		"directions" => array(
			"Preheat oven to 350 degrees.",
			"Lightly grease a 9 inch pie pan.",
			"Heat oil in a large skillet over medium heat.",
			"Add onions and caramelize.",
			"Deglaze with white wine, add garlic and scallions, and stir together.",
			"Stir in spinach and continue cooking until excess moisture is evaporated.",
			"Combine eggs, cheese, salt, and pepper in a large bowl.",
			"Add spinach mixture and stir to blend.",
			"Pour mixture into prepared pie pan.",
			"Slice tomato and lay on top of quiche.",
			"Bake in preheated oven until eggs have set, about 30 minutes."
		),
		"tags" => array(
			"healthy",
			"breakfast",
			"vegetables"
		)
	);

	$recipes[] = array(
		"key" => 107,
		"name" => "test",
		"img" => "img/recipes/",
		"author" => "Anonymous",
		"submission-date" => "2014-08-15",
		"blurb" => "",
		"ingredients" => array(
			"",
			"",
			"",
			"",
			""
		),
		"preptime" => "",
		"servings" => "",
		"directions" => array(
			"",
			"",
			"",
			"",
			""
		),
		"tags" => array(
			"top",
			"",
			""
		)
	);
	return $recipes;
}

?>