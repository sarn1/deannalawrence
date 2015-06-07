<?php get_header(); ?>
<div id="content_body">
<section>

	<!-- .container is main centered wrapper -->
	<div class="container">
	<?php
	if (have_posts()) {

		$post_type = get_post_type( $id );
		$archive_title = null;

		if ($post_type == 'news-post')
			$archive_title = "NEWS";
		elseif ($post_type == 'press-post')
			$archive_title = "PRESS";

		if (is_archive())
			if (is_null($archive_title))
				echo '<article><h1>BLOG</h1>';
			else
				echo '<article>';

		if (!is_null($archive_title)) echo "<h1>{$archive_title}</h1>";


		while (have_posts()) {the_post();

			if (is_front_page()) {
				?>
				<!-- homepage -->
				<div class="row _center">
					<div class="eight column">
						<img class="u-max-full-width homepage_banner"
							 src="/wp-content/uploads/2015/06/main-banner.jpg"
							 alt="Find your light; They can't love you if they can't see you. -Bette Midler"
							 title="Find your light; They can't love you if they can't see you. -Bette Midler"
							>
					</div>
				</div>

				<article>
					<div class="row _center">
						<div class="eight column"><h1><?php the_title(); ?></h1></div>
					</div>

					<div class="row _center">
						<div class="eight column"><?php the_content(); ?></div>
					</div>
				</article>

				<aside>
					<div class="row _center">
						<div class="one-half column"><img class="u-max-full-width"
														  src="/wp-content/uploads/2015/06/home-pic-1.jpg"></div>
						<div class="one-half column"><img class="u-max-full-width"
														  src="/wp-content/uploads/2015/06/home-pic-2.jpg"></div>
					</div>
				</aside>
				</div>

			<?php } elseif (is_archive()) { ?>

				<!-- each article -->
				<div class="row">
					<div class="eight column"><h2><?php the_title(); ?></h2></div>
				</div>

				<div class="row">
					<div class="eight column"><?php the_content(); ?></div>
				</div>

			<?php } else { ?>
				<!-- other pages -->
				<article>
					<div class="row">
						<div class="eight column">
							<?php if (is_single()) { ?>
								<h2><?php the_title(); ?></h2>
								<h3><?php
									$categories = get_the_category();
									$separator = ', ';
									$output = '';
									if($categories) {
										foreach ($categories as $category) {
											$output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
										}
										echo trim($output, $separator);
									}
									?></h3>
								<h3><?php the_date() ?></h3>
							<?php } else { ?>
								<h1><?php the_title(); ?></h1>
							<?php } ?>
						</div>
					</div>

					<div class="row">
						<div class="eight column"><?php the_content(); ?></div>
					</div>

					<!-- if single -->
					<?php if (is_single()) comments_template();  ?>
				</article>
			<?php

			}
		}

		if (!is_null($archive_title)) echo '<div class="page-link">'.posts_nav_link('<span class="page-link-spacer">&bull;</span>','< Newer posts  ','  Older posts >').'</div>';
		if (is_archive)	echo "</article>";


		if (is_home()) { ?>
			<div class="four column"><?php get_sidebar(); ?></div>
		<?}


	} elseif(is_404()){ ?>
		<div class="row _center">
			<div class="twelve columns">
				<article>
					<h1>We're sorry...</h1>
					<p>Looks like we can't find the page you are looking for!</p>
				</article>
			</div>
		</div>
<?php } ?>
	</div>




</section>
</div>
<?php get_footer(); ?>