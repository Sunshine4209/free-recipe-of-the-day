<?php

	xdebug_break();
	require_once('../../wp-config.php');
	
	$data = $_POST['ingredient'];
	
	
	// connecting to db
	$link = mysql_connect('localhost', DB_USER, DB_PASSWORD);
	if (!$link) 
	{
		die('Could not connect: '. mysql_error());
	}
	
	// selecting bd
	$db = mysql_select_db(DB_NAME);
	if (!$db) 
	{
		die('Invalid query: ' . mysql_error());
	}
	
	$query = $db->prepare("SELECT * FROM wp_terms WHERE slug='?'");
	$query->bindParam('%' . strtolower($data[0]) . '%');
	// first retrieve the ids from the ingredients
	//$query = 'SELECT * FROM wp_terms where slug="'. strtolower($data[0]) . '" or slug="' . strtolower($data[1]) .'"' ;
	
	// Perform Query
	$result = mysql_query($query);
	if (!$result) 
	{
		die('Invalid query: ' . mysql_error() . "\n");
	}
	$row = mysql_fetch_row($result);

	
	mysql_close();
	//do some processing
	$array = array("a"=>"Caucho", "b"=>"Resin", "c"=>"Quercus");
	echo json_encode($array);

?>

<?php 
//	xdebug_break();
?>
<div><h1>This Week Menu Plan</h1></div>
<p>Enjoy</p>
<div id="mp_mainContainer">
	<div class="mp_picture"><img src="wp-content/uploads/2012/06/beansenchiladas-80x70.png" width="80" height="70" /></div>
    <div class="mp_recipename">
    <h5><a href="http://www.freerecipeoftheday.com/?p=914" rel="bookmark" title="Permanent Link: Chinese Five Spice Turkey Wrap">Beans and Cheese Burritos</a></h5>
					
	<div>
	<span>In <a href="http://www.freerecipeoftheday.com/?cat=1" title="View all posts in 30 Minutes" rel="category">30 Minutes</a>, <a href="http://www.freerecipeoftheday.com/?cat=140" title="View all posts in Main Dishes" rel="category">Main Dishes</a>, <a href="http://www.freerecipeoftheday.com/?cat=25" title="View all posts in Poultry" rel="category">Poultry</a></span>
	<span>On January 3, 2013</span>
	</div>
    
    </div>	
    
	<div class="mp_picture"><img src="wp-content/uploads/2012/06/salsaVerde-80x70.png" width="80" height="70" /></div>
    <div class="mp_recipename">
    <h5><a href="http://www.freerecipeoftheday.com/?p=914" rel="bookmark" title="Permanent Link: Chinese Five Spice Turkey Wrap">Salsa Verde</a></h5>
					
	<div>
	<span>In <a href="http://www.freerecipeoftheday.com/?cat=1" title="View all posts in 30 Minutes" rel="category">30 Minutes</a>, <a href="http://www.freerecipeoftheday.com/?cat=140" title="View all posts in Main Dishes" rel="category">Main Dishes</a>, <a href="http://www.freerecipeoftheday.com/?cat=25" title="View all posts in Poultry" rel="category">Poultry</a></span>
	<span>On January 3, 2013</span>
	</div>
    
    </div>	
    
	<div class="mp_picture"><img src="wp-content/uploads/2012/08/buffalochickenwrap-80x70.png" width="80" height="70" /></div>
    <div class="mp_recipename">
    <h5><a href="http://www.freerecipeoftheday.com/?p=914" rel="bookmark" title="Permanent Link: Chinese Five Spice Turkey Wrap">Buffalo chicken wrap</a></h5>
					
	<div>
	<span>In <a href="http://www.freerecipeoftheday.com/?cat=1" title="View all posts in 30 Minutes" rel="category">30 Minutes</a>, <a href="http://www.freerecipeoftheday.com/?cat=140" title="View all posts in Main Dishes" rel="category">Main Dishes</a>, <a href="http://www.freerecipeoftheday.com/?cat=25" title="View all posts in Poultry" rel="category">Poultry</a></span>
	<span>On January 3, 2013</span>
	</div>
    </div>	
	<div class="mp_picture"><img src="wp-content/uploads/2012/08/tomatoprovencale-80x70.png" width="80" height="70" /></div>
    <div class="mp_recipename">
    <h5><a href="http://www.freerecipeoftheday.com/?p=914" rel="bookmark" title="Permanent Link: Chinese Five Spice Turkey Wrap">Tomatoes à la provençale</a></h5>
					
	<div>
	<span>In <a href="http://www.freerecipeoftheday.com/?cat=1" title="View all posts in 30 Minutes" rel="category">30 Minutes</a>, <a href="http://www.freerecipeoftheday.com/?cat=140" title="View all posts in Main Dishes" rel="category">Main Dishes</a>, <a href="http://www.freerecipeoftheday.com/?cat=25" title="View all posts in Poultry" rel="category">Poultry</a></span>
	<span>On January 3, 2013</span>
	</div>
    </div>	
	<div class="mp_picture"><img src="wp-content/uploads/2013/01/fiveSpiceTurkeyWrap-80x70.png" width="80" height="70" /></div>
    <div class="mp_recipename">
    <h5><a href="http://www.freerecipeoftheday.com/?p=914" rel="bookmark" title="Permanent Link: Chinese Five Spice Turkey Wrap">Chinese Five Spice Turkey Wrap</a></h5>
					
	<div>
	<span>In <a href="http://www.freerecipeoftheday.com/?cat=1" title="View all posts in 30 Minutes" rel="category">30 Minutes</a>, <a href="http://www.freerecipeoftheday.com/?cat=140" title="View all posts in Main Dishes" rel="category">Main Dishes</a>, <a href="http://www.freerecipeoftheday.com/?cat=25" title="View all posts in Poultry" rel="category">Poultry</a></span>
	<span>On January 3, 2013</span>
	</div>
    </div>	
	
</div> 

<div id="mp_grocerylist" class="note-wrapper">
<div class="mp_note-top"></div>
<div class="note-content">
<ul>
<li>Spaghetti sauce</li>
<li>Refried beans</li>
<li>Tomato sauce</li>
<li>Red Peppers (2)</li>
<li>Buffalo chicken</li>
<li>Blue cheese dressing</li>
<li>cole slaw</li>
<li>Flour tortillas</li>
<li>Tomatoes</li>
<li>Ground turkey</li>
<li>Cheddar cheese</li>
<li>Bibb lettuce</li>
<li>Sliced water chesnuts</li>
<li>Ginger</li>
<li id="mp_fullgrocerylist">Click for full grocery list</li>
</ul>
</div>
<div class="note-bottom"></div>
</div>

<p></p>


<hr class="mp_hr" />
<div id="mp_customGrocery">
<div><h1>Or create your own Menu Plan</h1></div>
<p>create your own menu plan by entering up to 6 ingredients in the boxes below. </p>
<div class="mp_girlsearch"><img src="wp-content/menuplanner/girlmenu.png" width="100" height="150" style="border:none;" /></div>
<form enctype="multipart/form-data" id="upload_ingredients">
	<div class="mp_searchingredient">
	<input type="text" value="Ingredient 1" name="i1" onfocus="if (this.value == 'Ingredient 1') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Ingredient 1'; }">
	</div>
	<div class="mp_searchingredient">
	<input type="text" value="Ingredient 2" name="i2" onfocus="if (this.value == 'Ingredient 2') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Ingredient 2'; }">
	</div>
	<div class="mp_searchingredient">
	<input type="text" value="Ingredient 3" name="i3" onfocus="if (this.value == 'Ingredient 3') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Ingredient 3'; }">
	</div>
	<div class="mp_searchingredient">
	<input type="text" value="Ingredient 4" name="i4" onfocus="if (this.value == 'Ingredient 4') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Ingredient 4'; }">
	</div>
	<div class="mp_searchingredient">
	<input type="text" value="Ingredient 5" name="i5" onfocus="if (this.value == 'Ingredient 5') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Ingredient 5'; }">
	</div>
	<div class="mp_searchingredient">
	<input type="text" value="Ingredient 6" name="i6" onfocus="if (this.value == 'Ingredient 6') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Ingredient 6'; }">
	</div>
	<div class="mp_searchingredient">
	<input type="submit" value="Create Menu Plan" id="submit-ingredients" onclick="return submit_form()">
	</div>
</form>
</div>

<p></p>
<div style="margin-top: 100px; margin-bottom:30px;">&nbsp;</div>

