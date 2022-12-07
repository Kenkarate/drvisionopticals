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
            <?php
                if ( has_post_thumbnail()) :
                    ?>
                        <div class="image">
                    <?php
                    the_post_thumbnail('full');
                    ?>
                            <div class="post-date bottom-left">
                                <div class="clearfix"></div>
                                <div class="post-day"><?php the_time(get_option('date_format')) ?></div>
                            </div>
                        </div>
                    <?php
                endif;
            ?>
            <div class="clearfix"></div>
            <div class="content">
                <h2 class="entry-title">
                    <?php
                        if ( is_sticky() && is_home() ) :
                            echo "<i class='la la-thumbtack'></i>";
                        endif;
                    ?>
                    <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>

                <?php
                    if(is_single()) :
                        the_content();
                        wp_link_pages(array(
                            'before' => '<div class="page-link">' . esc_html__('Pages:','own-shop'),
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        )); 
                        ?>
                            <div class="post-tags">
                                <?php the_tags(); ?>
                            </div>
                            <div class="post-categories">
                                <?php esc_html_e('Categories:','own-shop') ?><?php the_category(); ?>
                            </div>
                        <?php
                    else :
                        the_excerpt();  
                        ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('READ MORE','own-shop'); ?> <i class="la la-long-arrow-alt-right"></i></a>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
    </article>
    