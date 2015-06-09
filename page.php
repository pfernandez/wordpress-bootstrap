<?php
/*
The default page template
*/
?>

<?php get_header(); ?>
		
<div id="main" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	
		<header>
			
			
			<div class="container page-header">
				<div id="content" class="clearfix row">
					<div class="col-md-8 col-md-offset-2">
						<h1><?php the_title(); ?></h1>
						<?php if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'full' ); 
							$image_data = wp_get_attachment_metadata( get_post_thumbnail_id() );
							$caption = $image_data['image_meta']['caption'];
						?>
						
						
						<?php endif; ?>
					</div>
				</div>
			</div>
			
		</header> <!-- end article header -->
		
		<div class="container">
			<div id="content" class="clearfix row">
				<div class="col-md-8 col-md-offset-2">

					<section class="post_content">
						<?php the_content(); ?>			
					</section> <!-- end article section -->
				
					<footer>
						<p class="clearfix"><?php the_tags('<span class="tags">' 
							. __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
					</footer> <!-- end article footer -->
					
				</div>
			</div> <!-- end #content -->
		</div> <!-- end .container -->
		
	</article> <!-- end article -->

	<?php endwhile; else : ?>

	<div id="post-not-found">
		<header>
			<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
		</header>
		<section class="post_content">
			<p><?php _e("Sorry, but the requested resource was not found on this site.",
				"wpbootstrap"); ?></p>
		</section>
		<footer>
		</footer>
	</div>

	<?php endif; ?>

</div> <!-- end #main -->

<?php get_footer(); ?>
