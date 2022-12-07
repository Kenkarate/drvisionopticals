<?php
/**
 * Template part for displaying posts in a single post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package own-shop
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-post">
        	<div class="title">
        		<h1 class="entry-title">
                    <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>
        	</div>
            <div class="meta">
                <span class="meta-item date-single"><i class="la la-clock"></i><?php esc_html_e('Posted on','own-shop'); ?>: <?php the_time(get_option('date_format')) ?></span>
                <span class="meta-item author-single"><i class="la la-user"></i><?php esc_html_e('Posted by','own-shop'); ?>: <a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a></span>
                <span class="meta-item comments-single"><i class="la la-comments"></i><?php esc_html_e('Comments','own-shop'); ?>: <a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?></a></span>
            </div>
            <?php
            	if(has_tag()) :
            		?>
            			<div class="post-tags">
			                <i class="la la-tags"></i> <?php the_tags(); ?>
			            </div>
            		<?php
            	endif;
            ?>
            <div class="image">
                <?php
                    if ( has_post_thumbnail()) :
                        the_post_thumbnail('full');
                    endif;
                ?>
            </div>
            <div class="content">
                <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-link">' . esc_html__('Pages:','own-shop'),
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    )); 
                ?>
                <div class="post-categories">
                    <?php the_category(); ?>
                </div>
            </div>
        </div>
    </article>
    <?php esc_html(own_shop_single_post_after_content($post->ID)); ?>