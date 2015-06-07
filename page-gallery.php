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



        //check to see if a video id is present, if so show video
        $current_video_id = (int)$_REQUEST['video_id'];

        if (!empty($current_video_id)):
            query_posts(array(
                'post_type' => 'video',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'post_id'=>$current_video_id
            ));
            while (have_posts()): the_post(); ?>
                <h2><? the_title() ?></h2>

                <div class="video_container">
                    <div class="vendor">
                    <?= get_post_meta(get_the_ID(), 'wpcf-youtube-embed-code', true); ?>
                    </div>
                </div>
        <?php
            endwhile;
        endif;


        //go thru images
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

        ?>
    </div>


    <div class="one-third column">
        <aside>
            <h2>PHOTOS</h2>
            <ul><?= $photo_menu ?></ul>

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
                //$link = get_post_meta(get_the_ID(),'wpcf-youtube-embed-code',true);
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