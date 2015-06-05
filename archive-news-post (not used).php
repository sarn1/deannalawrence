<?php


get_header(); ?>
<div id="content_body">
archive news posts
	<section>

		<!-- .container is main centered wrapper -->
		<div class="container">
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
		?>

			<article>
				<div class="row">
					<div class="eight column"><h1><?php the_title(); ?></h1></div>
				</div>

				<div class="row">
					<div class="eight column"><?php the_content(); ?></div>
				</div>
			</article>
		<?php
			endwhile;
		endif;
		?>

		</div>


</section>
</div>
<?php get_footer(); ?>