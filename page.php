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
			<?php
				if ( $has_thumbnail = has_post_thumbnail() ) {
					$caption = get_post(get_post_thumbnail_id())->post_excerpt;
					$has_caption = !empty( $caption );
				} 
			?>
			<div class="container <?php echo ( $has_caption ? '' : 'page-header' ); ?>">
				<div id="content" class="clearfix row">
					<div class="col-md-8 col-md-offset-2">
						<h1><?php the_title(); ?></h1>
						<?php if ( $has_thumbnail ) : ?>
						<div class="<?php echo ( $has_caption ? 'wp-caption' : '' ); ?>">
							<?php the_post_thumbnail( 'full' ); ?>
							<?php if ( $has_caption ) : ?>
								<p class="wp-caption-text"><?php echo $caption ?></p>
							<?php endif; ?>
						</div>
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
