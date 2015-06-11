<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<main id="main" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" 
		itemscope itemtype="http://schema.org/BlogPosting">
		
		<header>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="container top-banner">
				<div class="row" style="margin: 0; background-size: cover !important;
					background: linear-gradient(to bottom, rgba(0, 62, 81, 0) 20%, rgba(0, 62, 81, 1) 100%),
					url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)) ?>) no-repeat;">
					<div class="col-sm-9 col-sm-offset-2 page-header">
						<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<?php else : ?>
			<div class="container page-header">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-2">
						<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</header>
		
		<div class="container">
			<div class="row">
		
				<div class="col-md-2 left-blog-sidebar">
					<section class="meta">
						<time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
							<?php echo get_the_date('F jS, Y', '','', FALSE); ?>
						</time>
						<p>
							<strong><?php _e("By:", "wpbootstrap"); ?></strong>
							<em><?php the_author_posts_link(); ?></em>
						</p>
						<p>
							<strong><?php _e("Posted in:", "wpbootstrap"); ?></strong>
							<em><?php the_category(', '); ?></em>
						</p>
					</section>
				</div>
				
				<div class="col-md-7">
				
					<section class="post_content clearfix" itemprop="articleBody">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</section>
					
					<footer>
						<?php the_tags('<div class="blog-tags"><span class="tags-title">' 
							. __("Tags","wpbootstrap") . ':</span> ', ', ', '</div>'); ?>
						<?php if( $user_level > 0 ) { ?>
						<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-default edit-post">
							<i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?>
						</a>
						<?php } ?>
					</footer>
					
					<section class="comments-section">
						<?php comments_template('',true); ?>
					</section>
					
				</div>
				
<?php endwhile; else : ?>
	
		<div class="container">
			<div class="row">
				<article id="post-not-found" class="col-md-9">
					<header>
						<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					</header>
					<section class="post_content">
						<p><?php _e("Sorry, but the requested resource was not found on this site.", 
							"wpbootstrap"); ?></p>
					</section>
					<footer>
					</footer>
	
<?php endif; ?>
	
				<aside class="col-md-3 right-blog-sidebar">
					<?php get_sidebar(); ?>
				</aside>
		
			</div> <!-- /.row -->
		</div> <!-- /.container -->

	</article>
</main>

<?php get_footer(); ?>
