<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package own-shop
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-post">
            <div class="image">
                <?php
                    if ( has_post_thumbnail()) :
                        the_post_thumbnail('full');
                    endif;
                ?>
            </div>
            <div class="content">
                <h5 class="entry-title">
                    <?php
                        if ( is_sticky() && is_home() ) :
                            echo "<i class='la la-thumbtack'></i>";
                        endif;
                    ?>
                    <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h5>
            </div>
            <div class="meta">
                <span class="meta-item"><i class="la la-clock"></i><?php esc_html_e('Posted on','own-shop'); ?>: <?php the_time(get_option('date_format')) ?></span>
                <span class="meta-item"><i class="la la-user"></i><?php esc_html_e('Posted by','own-shop'); ?>: <a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a></span>
                <span class="meta-item"><i class="la la-comments"></i><?php esc_html_e('Comments','own-shop'); ?>: <a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?></a></span>
            </div>
            
        </div>
    </article>
    