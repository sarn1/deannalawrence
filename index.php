<?php get_header(); ?>
<div id="content_body">
<section>

	<!-- .container is main centered wrapper -->
	<div class="container">
	<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
			if (is_front_page()) :
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
						<div class="one-half column"><img class="u-max-full-width" src="/wp-content/uploads/2015/06/home-pic-1.jpg"></div>
						<div class="one-half column"><img class="u-max-full-width" src="/wp-content/uploads/2015/06/home-pic-2.jpg"></div>
					</div>
				</aside>

			</div>

	<?php
			else:
				echo "other!";
			endif;
		endwhile;
	elseif (is_404()) : ?>
		<div class="row _center">
			<div class="twelve columns">
				<article>
					<h1>We're sorry...</h1>
					<p>Looks like we can't find the page you are looking for!</p>
				</article>
			</div>
		</div>
	<?php endif; ?>
	</div>







        <?php get_sidebar(); ?>









</section>
</div>
<?php get_footer(); ?>