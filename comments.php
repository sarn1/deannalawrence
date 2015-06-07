<div id="comments" class="comments-area">
   <?php if ( have_comments() ) : ?>
   <hr />
   <h1>People are saying...</h1>
    <ol class="commentlist">
        <?php wp_list_comments( array( 'callback' => 'mw_comments', 'style' => 'ol', 'avatar_size' => '48' ) ); ?>
    </ol>
<?php endif; ?>
<?php comment_form(); ?>
</div>