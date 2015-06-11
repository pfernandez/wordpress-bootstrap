<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>
		
<div id="main" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	
		<header>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="top-banner" style="background: <?php the_overlay(); ?>,
				url( <?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)) ?> );">
				<div class="container page-header">
					<div class="clearfix row">
						<div class="col-md-12">
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
			</div>
			<?php else : ?>
			<div class="container page-header">
				<div class="clearfix row">
					<div class="col-md-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</header> <!-- end article header -->
		
		<div class="container">
			<div id="content" class="clearfix row">
				<div class="col-md-12">

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
