<?php

	require_once('../../wp-config.php');

	$data = $_POST['ingredient'];
	
	for ($i = 0; $i < count($data); $i++) 
	{
		$temp = explode(" ", $data[$i]);
		if (count($temp) > 1)
		{
			$data[$i] = implode("-", $temp);
		}
	}

	// connecting to db
	$db = new mysqli('localhost', DB_USER, DB_PASSWORD, DB_NAME);
	if (!$db) 
	{
		die('Could not connect: '. mysql_error());
	}
	
	// retrieving tags
	$countData = count($data);
	
	// creating my object to send to the server.
	$myobject = array();
	
	if ($countData == 1)
	{
		$myString = "SELECT term_id FROM wp_terms WHERE slug like ?";
		$query = $db->prepare($myString);
		$a1 = '%'.strtolower($data[0]).'%';
		$query->bind_param('s', $a1);
	}
	else if ($countData == 2)
	{
		$myString = "SELECT term_id FROM wp_terms WHERE slug like ? or slug like ?";
		$query = $db->prepare($myString);
		$a1 = '%'.strtolower($data[0]).'%';
		$a2 = '%'.strtolower($data[1]).'%';
		$query->bind_param('ss', $a1, $a2);
	}
	else if ($countData == 3)
	{
		$myString = "SELECT term_id FROM wp_terms WHERE slug like ? or slug like ? or slug like ?";
		$query = $db->prepare($myString);
		$a1 = '%'.strtolower($data[0]).'%';
		$a2 = '%'.strtolower($data[1]).'%';
		$a3 = '%'.strtolower($data[2]).'%';
		$query->bind_param('sss', $a1, $a2, $a3);
	}
	else if ($countData == 4)
	{
		$myString = "SELECT term_id FROM wp_terms WHERE slug like ? or slug like ? or slug like ? or slug like ?";
		$query = $db->prepare($myString);
		$a1 = '%'.strtolower($data[0]).'%';
		$a2 = '%'.strtolower($data[1]).'%';
		$a3 = '%'.strtolower($data[2]).'%';
		$a4 = '%'.strtolower($data[3]).'%';
		$query->bind_param('ssss', $a1, $a2, $a3, $a4);
	}
	else if ($countData == 5)
	{
		$myString = "SELECT term_id FROM wp_terms WHERE slug like ? or slug like ? or slug like ? or slug like ? or slug like ?";
		$query = $db->prepare($myString);
		$a1 = '%'.strtolower($data[0]).'%';
		$a2 = '%'.strtolower($data[1]).'%';
		$a3 = '%'.strtolower($data[2]).'%';
		$a4 = '%'.strtolower($data[3]).'%';
		$a5 = '%'.strtolower($data[4]).'%';
		$query->bind_param('sssss', $a1, $a2, $a3, $a4, $a5);
	}
	else if ($countData == 6)
	{
		$myString = "SELECT term_id FROM wp_terms WHERE slug like ? or slug like ? or slug like ? or slug like ? or slug like ? or slug like ?";
		$query = $db->prepare($myString);
		$a1 = '%'.strtolower($data[0]).'%';
		$a2 = '%'.strtolower($data[1]).'%';
		$a3 = '%'.strtolower($data[2]).'%';
		$a4 = '%'.strtolower($data[3]).'%';
		$a5 = '%'.strtolower($data[4]).'%';
		$a6 = '%'.strtolower($data[5]).'%';
		$query->bind_param('ssssss', $a1, $a2, $a3, $a4, $a5, $a6);
	}
	
	$query->execute();
	
	$query->bind_result($term_id);
	$myTerms = array();
	while($query->fetch()) 
	{
        array_push($myTerms, $term_id);
	}
	
	// retrieving a list of recipes the user will choose from.
	$myRecipes = array();
	foreach ($myTerms as $terms) 
	{
		$myString = 'select object_id from wp_term_relationships where term_taxonomy_id=?';
		$query = $db->prepare($myString);
		$query->bind_param('i', $terms);
		$query->execute();
		$query->bind_result($reci_id);

		while($query->fetch()) 
		{
			array_push($myRecipes, $reci_id);
		}
	}
	
	// if myRecipes is longer than 30, pick 30 random recipes to display
	
	foreach ($myRecipes as $reci)
	{
		$temp = array();
		$temp["ID"] = $reci;
		
		
		// query to get some info about the recipe.
		$myString = 'select post_title, post_excerpt, guid, comment_count from wp_posts where ID=?';
		$query = $db->prepare($myString);
		$query->bind_param('i', $reci);
		$query->execute();
		$query->bind_result($title,$excerpt,$guid,$comment_count);

		while($query->fetch()) 
		{
			$temp["Title"] = $title;
			$temp["Excerpt"] = $excerpt;
			if ($excerpt == "")
			{
				$temp["Excerpt"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque elit eu ...";
			}
			else
			{
				$mypieces = explode(" ", $excerpt);
				$temp["Excerpt"] = implode(" ", array_slice($mypieces,0,12))." ...";
			}
			$temp["Link"] = $guid;
			$temp["Comments"] = $comment_count;
		}
		
		
		// retrieve indredients and id for picture
		$imageid = get_post_meta($reci, '_thumbnail_id', true);
		if ($imageid)
		{
			$temp["Picture_Link"] = $imageid;
			
			$myString = 'select guid from wp_posts where ID=?';
			$query = $db->prepare($myString);
			$query->bind_param('i', $imageid);
			$query->execute();
			$query->bind_result($guid);

			while($query->fetch()) 
			{
				
				// getting default.png
				$mytemp = explode("/", $guid);
				$myFilename = array_pop($mytemp);
				
				// getting default
				$myf = explode(".", $myFilename);
				$myf[0] = $myf[0]."-80x70";
				$myFilename = implode(".", $myf);
		
				$temp["Picture_Link"] = implode("/", $mytemp)."/".$myFilename;
			}
			
		}
		else
		{
			$temp["Picture_Link"] = "http://www.freerecipeoftheday.com/wp-content/uploads/2013/02/default-80x70.png";
		}
		
		$myIngredients = get_post_meta($reci, 'foodpress_groceryready', true);
		if ($myIngredients)
		{
			$temp["Ingredients"] = preg_split('#[\r\n]#', $myIngredients);
		}
		
		array_push($myobject, $temp);
	}

	mysql_close();
	
	//do some processing
	echo json_encode($myobject);

?>
