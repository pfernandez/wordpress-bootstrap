<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row contact">

	<div id="main" class="col col-lg-12 clearfix" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
			
			<div class="container">
		
				<section class="contact-info">
					<div class="row">
						<div class="col-sm-4 left">
							<?php the_field( 'contact_info' ); ?>
						</div>
						<div class="col-sm-8 right">
							<h2><?php the_field( 'contact_form_title' ); ?></h2>
							<div class="styled-form">
								<?php echo do_shortcode( 
									'[contact-form-7 id="42" title="Contact form 1"]' ); ?>
							</div>
						</div>
				</section>
				
			</div> <!-- end .container -->
			
			<?php get_template_part( 'signup' ); ?>
			
			<section class="team-members">
				<div class="container">
					<h2><?php the_field( 'team_members_title' ); ?></h2>
					<div class="row">
						<div class="col-sm-6">
							<?php the_field( 'team_members_left_column' ); ?>
						</div>
						<div class="col-sm-6">
							<?php the_field( 'team_members_right_column' ); ?>
						</div>
					</div>
				</div>
			</section>
		
		</div> <!-- end article -->
		
		<?php endwhile; endif; ?>

	</div> <!-- end #main -->
</div> <!-- end #content -->
		
<?php get_footer(); ?>
