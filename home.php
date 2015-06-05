<?php get_header(); ?>
<div id="content_body">
<section>

	<!-- .container is main centered wrapper -->
	<div class="container">
		<article>
			<div class="row">
				<div class="two-thirds column">
					<h1>BLOG</h1>

					<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
						<!-- each article -->
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
						<?php the_excerpt(); ?>
						<a class="more-link" href="<?php the_permalink();?>"><?php _e('Continue reading');?> <?php the_title();?> ></a>
						<hr />
					<?php } } ?>
					<div class="page-link"><?= posts_nav_link('<span class="page-link-spacer">&bull;</span>','< Newer posts  ','  Older posts >')?></div>
				</div>
				<div class="one-third column"><aside><?php get_sidebar(); ?></aside></div>
			</div>
		</article>
	</div>

</section>
</div>
<?php get_footer(); ?>