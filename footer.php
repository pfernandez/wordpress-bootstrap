
			
			
			<footer class="footer">
			
				<section class="four-column-footer">
					<div class="container">
						<div class="row">
								<?php if ( is_active_sidebar( 'four-column-footer' ) ) {
				        	dynamic_sidebar( 'four-column-footer' );
				        } ?>
						</div>
					</div>
				</section>
			
				<section role="contentinfo">
					<small class="clearfix container">
						<?php if( is_active_sidebar( 'footer-attribution' ) ) : ?>
			      <div class="pull-left footer-attribution">
			        <?php dynamic_sidebar( 'footer-attribution' ); ?>
			      </div>
				    <?php endif; ?>
				    <?php if ( has_nav_menu( 'footer_links' ) ) : ?>
						<nav class="pull-right footer-links"><?php wp_bootstrap_footer_links(); ?></nav>
						<?php endif; ?>
					</small>
				</section>
			</footer> <!-- end footer -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>
