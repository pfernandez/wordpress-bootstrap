<?php get_header(); ?>
<div class="container">
	<div id="content" class="clearfix row">
		<div id="main" class="col-sm-12 clearfix" role="main">
			<article id="post-not-found" class="clearfix">
				
				<header>
					<div class="hero-unit">
						<h1><?php _e( "404 - Not Found", "wpbootstrap" ); ?></h1>
					</div>
				</header> <!-- end article header -->
			
				<section class="post_content">
					<p><?php _e( "The page you were looking for wasn't found. Try again, "
						. "or search using the form below.", "wpbootstrap" ); ?></p>
					<div class="row">
						<div class="col col-lg-12 search-form">
							<?php get_search_form(); ?>
						</div>
					</div>
				</section> <!-- end article section -->
				
			</article> <!-- end article -->
		</div> <!-- end #main -->
	</div> <!-- end #content -->
</div> <!-- end .container -->
<?php get_footer(); ?>
