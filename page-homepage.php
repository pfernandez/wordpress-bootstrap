<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
<div id="video-modal">		
	<div class="container">
		<button class="video-toggle pull-right">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Close_X.png"
				alt="Close" />
		</button>
	</div>
	
	<div class="container overlay">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-video.png"
			alt="" height="480px" width="800px" />
	</div>
</div> <!-- end #video-modal -->

<section class="home-interactive">
	<h1>Touch. Engage. Connect.</h1>
	<div class="down-circle"></div>
	<!--[if lt IE 9]>
		<script>
		document.createElement('video');
		</script>
	<![endif]-->
	<video autoplay poster="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-homepage.png" id="interactive-vid">
		<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/Comp3_manual_animation.webm" type="video/webm">
		<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/Comp3_manual_animation.mp4" type="video/mp4">
	</video>
</section>
<section class="home-orange">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Touch may be the most powerful sense we experience in our everyday lives, allowing us to feel and anticipate the world around us.</h2>
				<a href="/markets/ "class="btn btn-default">Our Markets</a>
			</div>
		</div>
	</div>
</section>

<section class="home-about">
	<div class="container">
		<div class="row">
		<!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/What_are_haptics.jpg" alt="" class="about-image" />-->
			<div class="col-md-9 col-md-offset-1">
				<h2>With our highly advanced brand of haptic technology, Immersion has made touch a powerful part of our digital experience.</h2>
			</div>
			<div class="col-md-2 col-md-offset-8">
					<h4>What are haptics?</h4>
					<a href="/technology/" class="btn">Learn More</a>
				</div>
			</div>
	</div>
</section>

<section class="home-gray">
	<div class="container">
	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2>Immersion develops touch technology</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h3>Our software, tools, services and deep expertise supports the integration of touch in our digital life.</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul>
					<li class="icon-red"><a href="/technology"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Red_icon.png"
					alt="" /></a></li>
					<li class="icon-orange"><a href="/technology"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Orange_icon.png"
					alt="" /></a></li>
					<li class="icon-purple"><a href="/technology"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Purple_icon.png"
					alt="" /></a></li>
					<li class="icon-blue"><a href="/technology"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Blue_icon.png"
					alt="" /></a></li>
					<li class="icon-green"><a href="/technology"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Green_icon.png"
					alt="" /></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="market-blocks">
	<div class="row">
		<a href="/markets/immersive-entertainment">
		<div class="col-md-4 block-one immersive-entertainment">
			<h2>Immersive Entertainment</h2>
		</div>
		</a>
		<a href="/markets/virtual-communications">
		<div class="col-md-4 block-two virtual-communications">
			<h2>Virtual Communications</h2>
		</div>
		</a>
		<a href="/markets/the-connected-world">
		<div class="col-md-4 block-one connected-world">
			<h2>The Connected World</h2>
		</div>
		</a>
	</div>
</section>

<section class="home-technology" data-speed="6" data-type="background">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h2>Technology</h2>
				<p>Our technology is in billions of devices - smart phones, tablets, wearables, healthcare, automotive and gaming. And with a greater sense of touch, the customer experience is more engaging, more impactful and ultimately, more real.</p>
				<a href="#" class="btn-info btn-sm pull-right">See our products</a>
			</div>
			<div class="col-md-5 col-md-offset-1">
				<a href="#" class="video-toggle">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-video.png"
			alt="" />
				</a>
			</div>
	</div>
</section>

<section class="home-promo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-4 promo-content">
				<h5>Title of promo area</h5>
				<p>Lorem ipsum dolor sit amit sed amet ac mathis pasellus. Ipsum dolor sit amit sed amet ac mathis pasellus.</p>
				<a class="btn btn-sm">Learn More</a>
			</div>
		</div>
	</div>
	<img class="promo-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-promo.png"
			alt="" />
</section>

<section class="home-partners">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h2>Our Partners</h2>
				<p>We have formed deep relationships with our partners, representing a diverse range of industries from manufaturers to platform developers and production facilities.</p>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<a class="btn">Find out more</a>
			</div>
		</div>
	</div>
</section>

<section class="home-news">
	<div class="container">
		<div class="col-md-6 pull-right">
			<h2>Recent Coverage</h2>
			<div class="row">
				<a href="#"><div class="col-md-4 col-xs-4">
					<img class="press-logo"src="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-market-block-bg.png"
			alt="" />
				</div></a>
				<a href="#"><div class="col-md-4 col-xs-4">
					<img class="press-logo"src="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-market-block-bg.png"
			alt="" />
				</div></a>
				<a href="#"><div class="col-md-4 col-xs-4">
					<img class="press-logo"src="<?php echo get_stylesheet_directory_uri(); ?>/img/temp-market-block-bg.png"
			alt="" />
				</div></a>
			</div>
		</div>
		<div class="col-md-6">
			<h2>Immersion News</h2>
			<ul>
				<li>
					<p class="news-date">Mar 29, 2015</p>
					<a href="#"><h4>Beyond the Buzz: Why Haptics Matter</h4></a>
				</li>
				<li>
					<p class="news-date">Mar 29, 2015</p>
					<a href="#"><h4>Beyond the Buzz: Why Haptics Matter</h4></a>
				</li>
			</ul>
		</div>
	</div>
</section>

<?php get_footer(); ?>
