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
		elseif($post_type == 'post')
			$archive_title = "BLOG";

		if (!is_null($archive_title)) {
			echo '<article>';
			echo "<h1>{$archive_title}</h1>";
		}

		while (have_posts()) { the_post();
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

			<?php } elseif (is_archive() || is_home()) { ?>

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
						<div class="eight column"><h1><?php the_title(); ?></h1></div>
					</div>

					<div class="row">
						<div class="eight column"><?php the_content(); ?></div>
					</div>
				</article>
			<?php

			}
		}

		if (!is_null($archive_title)) {
			echo '<div class="page-link">'.posts_nav_link('<span class="page-link-spacer">&bull;</span>','< Newer posts  ','  Older posts >').'</div>';
			echo "</article>";
		}


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


        <?php //get_sidebar(); ?>

</section>
</div>
<?php get_footer(); ?>