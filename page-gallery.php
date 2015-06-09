<?php get_header(); ?>

<div id="content_body">
<section>

<!-- .container is main centered wrapper -->
<div class="container">
<article>
<div class="row">
    <!-- page title -->
    <div class="two-thirds column">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <h1><?php the_title(); ?></h1>
      <?php endwhile; endif;


        $current_video_id = (int)$_REQUEST['video_id'];
        $current_term_id = (int)$_REQUEST['term_id'];

        //if video_id, then show video
        if (!empty($current_video_id)) {
            query_posts(array(
                'post_type' => 'video',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                //'post_id'=>$current_video_id,
                'post__in' => array($current_video_id)

            ));
            while (have_posts()): the_post(); ?>
                <div class="video_container">
                    <div class="vendor">
                        <?= get_post_meta(get_the_ID(), 'wpcf-youtube-embed-code', true); ?>
                    </div>
                </div>
            <?php
            endwhile;

        //if term_id show album
        } else {

            //get default first term id if no term
            if(empty($current_term_id)) {
                $terms = get_terms( 'portrait-albums' );
                if (!empty( $terms ) && ! is_wp_error( $terms ) ):
                    $current_term_id = $terms[0]->term_id;
                endif;
            }


            query_posts(array(
                    'post_type' => 'portrait',
                    'post_status' => 'publish',
                    'showposts' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'portrait-albums',
                            'terms' => $current_term_id,
                            'field' => 'term_id',
                        )
                    ),
                    //'orderby' => 'title',
                    'order' => 'ASC')
            );

            while (have_posts()): the_post();
                $title = get_the_title();
                $thumbs = get_post_meta(get_the_ID(), 'wpcf-portrait-thumbnail', true);
                $full = get_post_meta(get_the_ID(), 'wpcf-portrait-full-size', true);
                $terms = get_the_terms(get_the_ID(), 'portrait-albums');
                ?>
                <!-- <a href="/gallery/?term_id=<?= $terms[0]->term_id ?>&photo_id=<?= get_the_ID() ?>"><img src="<?= $thumbs ?>" class="_thumbs"></a> -->
                <a href="<?= $full ?>" target="_blank"><img src="<?= $thumbs ?>" class="_thumbs"></a>
            <?php
            endwhile;


            //go thru images
            /*
            query_posts(array(
                'post_type' => 'portrait',
                'post_status' => 'publish',
                'posts_per_page' => -1
            ));

            $photo_menu = '';
            while (have_posts()): the_post();
                $title = get_the_title();
                $thumbs = get_post_meta(get_the_ID(), 'wpcf-portrait-thumbnail', true);
                $full = get_post_meta(get_the_ID(), 'wpcf-portrait-full-size', true);

                if (empty($current_video_id)):
                ?>
                    <a href="<?= $full ?>" target="_blank"><img class="_thumbs" src="<?= $thumbs ?>"/></a>
                <?php
                endif;

                $photo_menu .= '<li><a href="' . $full . '" target="_blank">' . $title . '</a></li>';
            endwhile;
            */

        }


        ?>
    </div>


    <div class="one-third column">
        <aside>
            <!-- photos menu -->
            <h2>PHOTOS</h2>
            <ul>
            <?php
                $terms = get_terms( 'portrait-albums' );
                if (!empty( $terms ) && ! is_wp_error( $terms ) ):
                    foreach ( $terms as $term ): ?>
                        <li><a class="<?=($current_term_id == $term->term_id)?'current_page_item':'';?>" href="/gallery/?term_id=<?=$term->term_id?>"><?=$term->name?></a></li>
            <?php   endforeach;
                endif;
            ?></ul>

            <!-- videos menu -->
            <h2>VIDEOS</h2>
            <ul>
            <?php
                //go thru videos
                query_posts(array(
                    'post_type'=>'video',
                    'post_status'=>'publish',
                    'posts_per_page'=>-1
                ));

                while (have_posts()): the_post();
                $title = get_the_title();
                $id = get_the_id();
            ?>
                <li><a href="/gallery/?video_id=<?=$id?>" class="<?= ($id == $current_video_id )? 'current_page_item':'' ?>"><?=$title?></a></li>
            <? endwhile; ?>
            </ul>
        </aside>

    </div>
</div>
</article>

</div>

</section>
</div>

<!-- fitvid cdn -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.js' async></script>


<?php get_footer(); ?>