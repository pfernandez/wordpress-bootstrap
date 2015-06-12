			<footer class="footer">
			
				<?php if( is_active_sidebar( 'four-column-footer' ) ) : ?>
				<section class="four-column-footer">
					<div class="container">
						<div class="row">
							<?php dynamic_sidebar( 'four-column-footer' ); ?>
						</div>
					</div>
				</section>
				<?php endif; ?>
			
				<section class="sub-footer clearfix" role="contentinfo">
					<?php if( is_active_sidebar( 'footer-attribution' ) ) : ?>
		      <div class="footer-attribution">
		        <?php dynamic_sidebar( 'footer-attribution' ); ?>
		      </div>
			    <?php endif; ?>
			    <?php if( has_nav_menu( 'footer_links' ) ) : ?>
					<nav class="footer-links"><?php wp_bootstrap_footer_links(); ?></nav>
					<?php endif; ?>
				</section>
				
			</footer> <!-- end footer -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>
