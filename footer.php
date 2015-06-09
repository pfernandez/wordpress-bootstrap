
			
			
			<footer class="footer">
			
				<section class="four-column-footer">
					<div class="container">
						<h1><?php bloginfo('name'); ?></h1>
						<div class="row">
								<?php if ( !function_exists('dynamic_sidebar') 
				        	|| !dynamic_sidebar('four-column-footer') ) : ?>
				        <?php endif; ?>
						</div>
					</div>
				</section>
			
				<section role="contentinfo">
					<small class="clearfix container">
				      <div class="pull-left">
				        <?php if ( !function_exists('dynamic_sidebar') 
				        	|| !dynamic_sidebar('footer-attribution') ) : ?>
				        <?php endif; ?>
				      </div>
							<nav class="pull-right"><?php wp_bootstrap_footer_links(); ?></nav>
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
