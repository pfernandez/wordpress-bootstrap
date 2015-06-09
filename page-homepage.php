<?php
/*
Template Name: Homepage
*/

get_header();
$img_dir = get_stylesheet_directory_uri() . '/img';

?>

<div id="content" class="clearfix row">

	<div id="main" class="col-sm-12 clearfix" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
		
			<header class="content-section video-section">
				<div class="player">
					<video id="banner-vid" autoplay poster="<?php echo $img_dir; ?>/home-banner-bg.jpg" loop>
						<source src="<?php echo $img_dir; ?>/home-banner-bg.webm" type="video/webm">
						<source src="<?php echo $img_dir; ?>/home-banner-bg.mp4" type="video/mp4">
					</video>
				</div>
				<div class="pattern-overlay">
					<div class="container">
						<h1><?php the_field( "headline" ); ?></h1>  
						
						<a class="btn btn-link wplightbox" 
							href="<?php the_field( 'mp4_promo_video' ); ?>"
							data-webm="<?php the_field( 'webm_promo_video' ); ?>">
							<?php the_field( "play_button_text" ); ?></a>
							
						<script type="text/javascript" charset="utf-8">
							jQuery(document).ready(function($) {
								$('a.wplightbox').click(function() {
									
									// Pause the banner video when the lightbox opens.
									var bannerVid = $('#banner-vid')[0];
									bannerVid.pause();
									
									// Add handlers after the video loads.
									setTimeout(function(){
										var $closeBtn = $('#html5-close');
											
										// Play the banner video when the lightbox closes.
										$closeBtn.click(function() { bannerVid.play(); });
										
										//Close the lightbox when the video ends.
										$('#html5-lightbox video').on('ended', function() { $closeBtn.click(); });
									}, 2000);
								});
							});
						</script>
						
						<!-- Remove the following line once Wonderplugin is tested & paid for. -->
						<style type="text/css">#html5-watermark { display: none !important; }</style>
						
					</div>
				</div>
			</header> <!-- end article header -->
			
			<section class="call-to-action">
				<div class="container">
					<a href="<?php the_field( 'cta_link' ); ?>" class="grad-border" target="_blank">
						<?php the_field( "cta_link_text" ); ?>
					</a>	
					<p><?php the_field( "cta_message" ); ?></p>
				</div>
			</section>
			
			<section class="carousel">
				<?php echo do_shortcode('[image-carousel category="home-page"]'); ?>
			</section>

			<section class="market-icons">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<a href="<?php the_field( 'market_1_link' ); ?>">
								<img src="<?php the_field( 'market_1_icon' ); ?>">
								<h2><?php the_field( 'market_1_title' ); ?></h2>
							</a>
						</div>
						<div class="col-sm-3">
							<a href="<?php the_field( 'market_2_link' ); ?>">
								<img src="<?php the_field( 'market_2_icon' ); ?>">
								<h2><?php the_field( 'market_2_title' ); ?></h2>
							</a>
						</div>
						<div class="col-sm-3">
							<a href="<?php the_field( 'market_3_link' ); ?>">
								<img src="<?php the_field( 'market_3_icon' ); ?>">
								<h2><?php the_field( 'market_3_title' ); ?></h2>
							</a>
						</div>
						<div class="col-sm-3">
							<a href="<?php the_field( 'market_4_link' ); ?>">
								<img src="<?php the_field( 'market_4_icon' ); ?>">
								<h2><?php the_field( 'market_4_title' ); ?></h2>
							</a>
						</div>
					</div>
				</div>
			</section>
			
			<section class="blurb">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 left">
							<?php the_field( "below_slider_message_area" ); ?>
						</div>
						<div class="col-sm-6 right">
							<img src="<?php echo $img_dir; ?>/Next_level.jpg">
						</div>
					</div>
				</div>
			</section>
			
			<section class="stats">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<strong class="text-impact"><?php the_field( "stat_1_title" ); ?></strong>
							<div id="stat-1" class="circle-progress"><strong></strong></div>
							<p><?php the_field( "stat_1_message" ); ?></p>
						</div>
						<div class="col-sm-4">
							<strong class="text-impact"><?php the_field( "stat_2_title" ); ?></strong>
							<div id="stat-2" class="circle-progress"><strong></strong></div>
							<p><?php the_field( "stat_2_message" ); ?></p>
						</div>
						<div class="col-sm-4">
							<strong class="text-impact"><?php the_field( "stat_3_title" ); ?></strong>
							<div id="stat-3" class="circle-progress"><strong></strong></div>
							<p><?php the_field( "stat_3_message" ); ?></p>
						</div>
					</div>
				</div>
			</section>
			
			<?php get_template_part( 'signup' ); ?>
		
		</article> <!-- end article -->
		
		
		<?php endwhile; endif; ?>

	</div> <!-- end #main -->
</div> <!-- end #content -->

<script type="text/javascript">

	jQuery(document).ready(function($) {
		$("#ts-demo-vid").on('end', function() {
		alert('The End');
    });
	});
</script>

<?php get_footer(); ?>
