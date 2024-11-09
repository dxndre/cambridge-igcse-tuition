<?php
/**
 * The template for displaying search forms (for posts).
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo get_permalink( your_search_posts_page_id_here ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
        <input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ); ?>" />
    </label>
    <input type="hidden" name="post_type" value="post" />
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
</form>
