<?php
/** * W skrypcie można zobaczyć wykorzystanie PHP wordpress w zwkłym HTML */
get_header();
?>
<body class="footer-sticky expand-featured-media">
	<header id="top">
		<div class="navbar navbar-sticky">
			<div class="container">
				<div class="row align-items-center">
					<div class="site-title col col-lg-auto order-first">
						<h1><a href="index.html" class="custom-logo-link" rel="home"><img src="<?php echo get_bloginfo('template_url'); ?>/tmp/logo.png" class="custom-logo" width="98" height="30" alt="Patwav.pl"></a></h1>
					</div>
					<nav id="site-menu" class="col-12 col-lg order-3 order-sm-4 order-lg-2">
						<ul>
						<?php 
								wp_nav_menu( 
									array( 
										'theme_location' => 'my-custom-menu'
									) 
								); 
							?>
							
						</ul>
					</nav>
					<div class="call-to-action col-12 col-lg-auto order-5 order-xl-4">
						<a href="#" class="button button-small button-color button-filled" target="_blank"><span class="mdi mdi-rss"></span> Obserwuj stronę</a>
					</div>
					<div class="site-menu-toggle col-auto order-2 order-sm-3">
						<a href="#site-menu">
							<span class="screen-reader-text">Toggle navigation</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div id="featured" class="featured-content">
			<div class="container">
				<div class="row align-items-md-center">
					<div class="col-12 col-md">
						<h2><?php single_post_title(); ?></h2>
					</div>
				</div>
			</div>
			<div id="featured-media" class="featured-media">
				<img src="<?php echo get_bloginfo('template_url'); ?>/tmp/sample-post.jpg" alt="">
			</div>
		</div>
	</header>

	<main id="content">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-8 col-lg-9">
					<div class="episodes-listing">
					
							<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								
								
								<article class="entry entry-episode has-post-thumbnail">
							<div class="row align-items-lg-center">
								<div class="col-12 col-lg-4">
									<div class="entry-media">
										<a href="<?php the_permalink() ?>"><img src="<?php the_field('zdjecie'); ?>" width="480" height="480" alt=""></a>
									</div>
								</div>
								<div class="col-12 col-lg-8">
									<header class="entry-header">
										<div class="entry-meta">
											<?php
											$category = get_the_category();
											echo $category[0]->cat_name;
											?>
											</div>
										<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									</header>
									<div class="entry-audio">
										<div class="podcast-episode-player" data-episode-download="<?php the_field('audiourl'); ?>" data-episode-download-button="Pobierz" data-episode-duration="" data-episode-size="">
											<audio class="wp-audio-shortcode" preload="none">
												<source src="<?php the_field('audiourl'); ?>" type="audio/mpeg" />
											</audio>
										</div>
									</div>
									<div class="entry-content">
										<p>
												<?php
												$char_limit = 300; //character limit
												$content = $post->post_content; //contents saved in a variable
												echo substr(strip_tags($content), 0, $char_limit);
												
												?>
												<br>
												<a href="<?php the_permalink() ?>">Zobacz więcej</a>
										</p>
									</div>
								</div>
							</div>
						</article>

							<?php endwhile; ?>
							<?php endif; ?>
						
					</div>
				</div>
					
							
							<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
								<div class="col-12 col-md-4 col-lg-3"><aside id="sidebar" class="widget-area"><section class="widget widget_tag_cloud">
									<?php dynamic_sidebar('sidebar-1'); ?>
								</section></aside></div>
							<?php } ?>
							
						
					
			</div>
		</div>
	</main>

	
<?php
get_footer();
?>