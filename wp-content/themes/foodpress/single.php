<?php include('header.php'); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="title-wrapper">
	
		<div id="title">
	
			<div class="title-text<?php $title = get_the_title(); $title_length = strlen($title); if($title_length >= 56) { echo ' big'; } ?>">
				<h1><?php the_title(); ?></h1>
				<span><?php _e('By', 'FoodPress'); ?> <?php the_author_posts_link(); ?>, <?php the_time( get_option('date_format') ); ?>, <?php _e('In', 'FoodPress'); ?> <?php the_category(', ') ?></span>
			</div>
			
			<?php if(get_post_meta($post->ID, "foodpress_servings", true) || get_post_meta($post->ID, "foodpress_cooking_time", true)) { ?>
			<div id="recipe-info">
				<?php if(get_post_meta($post->ID, "foodpress_servings", true)) { ?>
				<span class="persons"><?php echo get_post_meta($post->ID, "foodpress_servings", true); ?> Servings</span>
				<?php } ?>
				<?php if(get_post_meta($post->ID, "foodpress_cooking_time", true)) { ?>
				<span class="time">~ <?php echo get_post_meta($post->ID, "foodpress_cooking_time", true); ?></span>
				<?php } ?>
			</div>
			<?php } ?>
			
		</div>
	
	</div>

	<div id="crumbs-wrapper">
			
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			
	</div>
	
	<div id="wrapper">
	
		<div id="main">
		
			<div id="post">
		
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
				<?php the_post_thumbnail('post-thumb', array('class' => 'post-thumb')); ?>
				<?php } ?>


			<?php if(get_post_meta($post->ID, "foodpress_calories", true)) { ?>
				<div style="width: 620px;height: 58px; #E5E5E5 ;margin-bottom: 20px; margin-top: -10px;margin-left: 2px;">
					<div class="nutritional-item"><span style="font-size: 30px;">
					<?php if(get_post_meta($post->ID, "foodpress_calories", true)) { ?>
						<?php echo get_post_meta($post->ID, "foodpress_calories", true); ?>
					<?php } ?>
						</span> <br/>Calories</div>
					<div class="nutritional-item"><span style="font-size: 30px;">

					<?php if(get_post_meta($post->ID, "foodpress_fat", true)) { ?>
						<?php echo get_post_meta($post->ID, "foodpress_fat", true); ?>
					<?php } else {?>
						0
					<?php } ?>

							g</span> <br/>Fat</div>
					<div class="nutritional-item"><span style="font-size: 30px;">

					<?php if(get_post_meta($post->ID, "foodpress_cholesterol", true)) { ?>
						<?php echo get_post_meta($post->ID, "foodpress_cholesterol", true); ?>
					<?php } else {?>
						0
					<?php } ?>

							mg</span> <br/>Cholesterol</div>
					<div class="nutritional-item"><span style="font-size: 30px;">

					<?php if(get_post_meta($post->ID, "foodpress_carbs", true)) { ?>
						<?php echo get_post_meta($post->ID, "foodpress_carbs", true); ?>
					<?php } else {?>
						0
					<?php } ?>

							g</span> <br/>Carbohydrates</div>
					<div class="nutritional-item"><span style="font-size: 30px;">

					<?php if(get_post_meta($post->ID, "foodpress_protein", true)) { ?>
						<?php echo get_post_meta($post->ID, "foodpress_protein", true); ?>
					<?php } else {?>
						0
					<?php } ?>

							g</span> <br/>Proteins</div>
				</div>
			<?php } ?>

				<div class="post-content">
				
					<?php if(get_post_meta($post->ID, "foodpress_ingredients", true)) { ?>
					<div class="note-wrapper">
					
						<div class="note-top"></div>
						
						<div class="note-content">
						
							<ul>
								<?php
									
									$get_ingredients = get_post_meta($post->ID, "foodpress_ingredients", true);
									$ingredients = explode("\r", $get_ingredients);
									
									foreach($ingredients as $ingredient) {
									
										echo '<li>' . $ingredient . '</li>';
										
									}
								
								?>
							</ul>
						
						</div>
						
						<div class="note-bottom"></div>
					
					</div>
					<?php } ?>
				
					<?php the_content(); ?>
					<?php wp_link_pages('before=<span class="page-links"><strong>Pages:</strong> &after=</span>'); ?>
					
				</div>
				
				<div class="post-tags">
					<?php the_tags('', ''); ?> 
				</div>
		
			</div>
			


			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- FROTD_single_post -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-0791652955704254"
     data-ad-slot="7905428933"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br /><br />
			<?php if(get_option('fp_author_box') == "false" || get_option('fp_author_box') == "") { ?>
			<div class="post-block">
			
				<h3>About the Author: <?php the_author_posts_link(); ?></h3>
				
				<?php echo get_avatar( get_the_author_meta('email'), '75' ); ?>
				
				<p class="about-author-text"><?php the_author_meta("description"); ?></p>
			
			</div>
			<?php } ?>
			
			<?php if(get_option('fp_related_posts') == "false" || get_option('fp_related_posts') == "") { ?>
			<?php $tags = get_the_tags(); ?>
			<?php if($tags): ?>
			<?php $related = get_related_posts($post->ID, $tags); ?>
			<?php if($related->have_posts()) : ?>
			<div class="post-block">
			
				<h3>Related Posts</h3>
				
				<?php while($related->have_posts()): $related->the_post(); ?>
				<div class="post-item-grid">
				
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('grid-thumb'); ?></a>
					<?php } ?>
					
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<div class="post-item-meta">
						<span>In <?php the_category(', ') ?></span>
						<span>On <?php the_time( get_option('date_format') ); ?></span>
					</div>
					
				</div>
				<?php endwhile; ?>
			
			</div>
			<?php endif; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			<?php } ?>
			
			<div class="post-block">
				
				<?php comments_template(); ?>
			
			</div>
			
			<?php endwhile; endif; ?>
		
		</div><!-- END MAIN -->
</div> <!-- END WRAPPER -->

<?php include('sidebar.php'); ?>
		
<?php include('footer.php'); ?>