<?php get_header(); ?>
<div class="container index">

	<div id="content" class="clearfix row">
	
		<div id="main" class="col-md-9 clearfix" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix row'); ?> role="article">
				
				<section class="meta col-sm-2 left-blog-sidebar">
					<time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
						<?php echo get_the_date('F jS, Y', '','', FALSE); ?>
					</time>
					<p>
						<strong><?php _e("By", "wpbootstrap"); ?></strong>
						<em><?php the_author_posts_link(); ?></em>
					</p>
					<p>
						<strong><?php _e("Posted in", "wpbootstrap"); ?></strong>
						<em><?php the_category(', '); ?></em>
					</p>
				</section>
				
				<div class="col-sm-10">
					<header>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark"
									title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					</header> <!-- end article header -->
		
					<section class="post_content clearfix">
						<?php the_excerpt(); ?>
					</section> <!-- end article section -->
				
					<footer>
						<?php the_tags('<div class="blog-tags"><span class="tags-title">' 
							. __("Tags","wpbootstrap") . ':</span> ', ', ', '</div>'); ?>
					</footer> <!-- end article footer -->
				</div>
				
			</article> <!-- end article -->
			
			<?php endwhile; ?>	
			
			<?php if (function_exists('wp_bootstrap_page_navi')) { // if expirimental feature is active ?>
				
				<?php wp_bootstrap_page_navi(); // use the page navi function ?>
				
			<?php } else { // if it is disabled, display regular wp prev & next links ?>
				<nav class="wp-prev-next">
					<ul class="pager">
						<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
						<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
					</ul>
				</nav>
			<?php } ?>		
			
			<?php else : ?>
			
			<article id="post-not-found">
			    <header>
			    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
			    </header>
			    <section class="post_content">
			    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
			    	<div class="row">
							<div class="col col-lg-12">
								<?php get_search_form(); ?>
							</div>
						</div>
			    </section>
			    <footer>
			    </footer>
			</article>
			
			<?php endif; ?>
	
		</div> <!-- end #main -->

		<div class="col-md-3 right-blog-sidebar">
			<?php get_sidebar(); // sidebar 1 ?>
		</div>

	</div> <!-- end #content -->
</div> <!-- end .container -->
<?php get_footer(); ?>
