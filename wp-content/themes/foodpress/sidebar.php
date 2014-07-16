		<div id="sidebar">
            <div class="widget">
                <h3>Search the site</h3>
                <div id="search-wrapper">
                    <?php get_search_form(); ?>
                </div>

            </div>
			<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Main Sidebar')): 
			endif;
			?>
		
		</div><!-- END SIDEBAR -->