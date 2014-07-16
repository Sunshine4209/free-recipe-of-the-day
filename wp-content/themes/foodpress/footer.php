	
	</div><!-- END WRAPPER -->
	
	<div id="footer-wrapper">
	
		<div id="footer">
		
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 1') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 2') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 4') ) ?>
		
		</div>
	
	</div><!-- END FOOTER-WRAPPER -->
	
	<div id="footer-bottom-wrapper">
	
		<div id="footer-bottom">
		
			<span class="footer-left">Copyright &copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All rights reserved</span>
			<span class="footer-right">Powered by <a href="http://www.wikmag.com/foodpress-recipe-food-theme.html" target="_blank">FoodPress</a></span>
		
		</div>
	
	</div>
	
	<?php wp_footer(); ?>
	<?php $google_analytics = get_option('fp_google_analytics'); if ($google_analytics) { echo stripslashes($google_analytics); } ?>
</body>
</html>