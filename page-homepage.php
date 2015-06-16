<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<div class="container">
	<div id="content">
		<div id="main" role="main">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				
				<header>
					
					<?php
						$post_thumbnail_id = get_post_thumbnail_id();
						$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-wide' );
					?>
					
					<div class="jumbotron" style="background-image: url('<?php echo $featured_src[0]; ?>');
						background-repeat: no-repeat; background-position: 0 0;">
					
						<div class="page-header">
							<h1><?php bloginfo('title'); ?>
								<small><?php echo get_post_meta($post->ID, 'custom_tagline' , true);?></small>
							</h1>
						</div>
						
					</div>
				
				</header>
				
				<section class="post_content">
					<?php the_content(); ?>
				</section> <!-- end article header -->
			
			</article> <!-- end article -->
			
			<?php endwhile; else : ?>
			
			<article id="post-not-found">
			    <header>
			    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
			    </header>
			    <section class="post_content">
			    	<p><?php _e("Sorry, but the requested resource was not found on this site.",
			    		 "wpbootstrap"); ?></p>
			    </section>
			    <footer>
			    </footer>
			</article>
			
			<?php endif; ?>
			
		</div> <!-- end #main -->   
	</div> <!-- end #content -->
</div> <!-- end .container -->

<?php get_footer(); ?>
