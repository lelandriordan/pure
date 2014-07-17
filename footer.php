<?php
/**
 * Pure's Footer Template
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
		/**
		 * Only get the Primary menu if it is set in the WordPress Admin.
		 * The menu_class argument breaks if there is no menu activated in the WordPress Admin
		 */
		if ( has_nav_menu( 'footer' ) ) :
			wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => 'pure-menu pure-menu-horizontal pure-menu-open' ) );
		endif;
	?>
	<div class="site-info">
		<?php printf( __( 'The %1$s by %2$s.', 'pure' ), 'Pure Theme', '<a href="http://www.lelandriordan.com" rel="designer">Leland Riordan</a>' ); ?>
	</div>
</footer>
</div><!-- End #content -->
</div><!-- End #page -->

<?php wp_footer(); ?>
</body>
</html>